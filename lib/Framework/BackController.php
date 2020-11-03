<?php
namespace Framework;

abstract class BackController extends ApplicationComponent
{
    protected $action;
    protected $module;
    protected $page;
    protected $view;
    protected $managers = null;

    public function __construct(Application $app, $module, $action)
    {
        parent::__construct($app);

        $this->managers = new Managers('PDO', PDOFactory::getMySQLConnexion());
        $this->page = new Page($app);

        $this->setAction($action);
        $this->setModule($module);
        $this->setView($action);
    }

    public function execute()
    {
        $method = 'execute'.ucfirst($this->action);

        if (!is_callable([$this, $method]))
        {
            throw new \RuntimeException('Action "'.$this->action.'" is not defined in this module.');
        }

        $this->$method($this->app->httpRequest());
    }

    // getters
    public function page()
    {
        return $this->page;
    }

    // setters
    public function setModule($module)
    {
        if (!is_string($module) || empty($module))
        {
            throw new \InvalidArgumentException('Module should be a valid string.');
        }
        $this->module = $module;
    }

    public function setAction($action)
    {
        if (!is_string($action) || empty($action))
        {
            throw new \InvalidArgumentException('Action should be a valid string.');
        }
        $this->action = $action;
    }

    public function setView($view)
    {
        if (!is_string($view) || empty($view))
        {
            throw new \InvalidArgumentException('View should be a valid string.');
        }
        $this->view = $view;

        $this->page->setContentFile(__DIR__.'/../../App/'.$this->app->name().'/Modules/'.$this->module.'/Views/'.$this->view.'.php');
    }
}