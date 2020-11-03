<?php
namespace Framework;

class Router
{
    protected $routes = [];

    const NO_ROUTE=1;

    public function addRoute(Route $route)
    {
        if (!in_array($route,$this->routes))
        {
            $this->routes[] = $route;
        }
    }

    public function getRoute($url)
    {
        foreach ($this->routes as $route)
        {
            // if the route matches the given url
            if (($varsValues = $route->match($url)) !== false)
            {
                // if the route has vars
                if ($route->hasVars())
                {
                    $varsNames = $route->varsNames();
                    $listVars = [];

                    foreach ($varsValues as $key => $match)
                    {
                        if ($key!==0)
                        {
                            $listVars[$varsNames[$key-1]] = $match;
                        }
                    }
                    $route->setVars($listVars);
                }
                return $route;
            }
        }

        // if no route matches the url
        throw new \RuntimeException('No route matching this URL.', self::NO_ROUTE);
    }
}