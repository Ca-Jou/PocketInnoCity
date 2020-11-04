<?php
namespace Framework;

abstract class Application
{
    protected $httpRequest;
    protected $httpResponse;
    protected $name;
    protected $visitor;
    protected $config;

    public function __construct()
    {
        $this->httpRequest = new HTTPRequest($this);
        $this->httpResponse = new HTTPResponse($this);
        $this->visitor = new Visitor($this);
        $this->config = new Config($this);
        $this->name = '';
    }

    public function getController()
    {
        $router = new Router;

        // retrieve the routes stored in our routes.xml config document
        $xml = new \DOMDocument;
        $xml->load(__DIR__.'/../../App/'.$this->name.'/Config/routes.xml');
        $routes = $xml->getElementsByTagName('route');

        // browse the routes
        foreach ($routes as $route)
        {
            $vars = [];
            if ($route->hasAttribute('vars'))
            {
                $vars = explode(',', $route->getAttribute('vars'));
            }

            // add current route to router
            $router->addRoute(new Route($route->getAttribute('url'), $route->getAttribute('module'), $route->getAttribute('action'), $vars));
        }

        try
        {
            // we retrieve the route corresponding to the HTTP Request URL
            $matchedRoute = $router->getRoute($this->httpRequest->requestURI());
        }
        catch (\RuntimeException $e)
        {
            if ($e->getCode() == Router::NO_ROUTE)
            {
                // if the page doesn't exist -> 404!
                $this->httpResponse->redirect404();
            }
        }

        // add the URL variables to the $_GET array
        $_GET = array_merge($_GET, $matchedRoute->vars());

        // create an instance of the right controller
        $controllerClass = 'App\\'.$this->name.'\\Modules\\'.$matchedRoute->module().'\\'.$matchedRoute->module().'Controller';
        return new $controllerClass($this, $matchedRoute->module(), $matchedRoute->action());
    }

    abstract public function run();

    // getters
    public function httpRequest()
    {
        return $this->httpRequest;
    }

    public function httpResponse()
    {
        return $this->httpResponse;
    }

    public function name()
    {
        return $this->name;
    }

    public function visitor()
    {
        return $this->visitor;
    }

    public function config()
    {
        return $this->config;
    }
}