<?php

namespace OloloCms\Core\Network;

/**
 * Класс обработки запросов
 */
class Request
{
    protected $route;
    protected $url;

    public function __construct()
    {
        $this->url = $_SERVER['REQUEST_URI'];
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setRouteName($routeName)
    {
        $this->route = $routeName;
    }

    public function getRouteName()
    {
    	return $this->route;
    }

}
