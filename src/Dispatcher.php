<?php

namespace IagoEffting\MicroMVC;

use IagoEffting\MicroMVC\Contracts\View\ViewInterface;

trait Dispatcher
{

    public function dispatch($request, $response)
    {

        $routeSelected = $this->getUriRoute($request->uri);

        $controller = new $routeSelected['Controller']();
        $action = $routeSelected['Action'];

        $view =$controller->$action($request, $response);

        if ($view instanceof ViewInterface) {
            $view->setViewContext($this);

        }

        echo $view;

    }

    private function getUriRoute($uri)
    {

        foreach ($this['routes'] as $route) {
            if ($route['path'] == $uri) {
                return $route;
            }
        }

        return false;
    }

}