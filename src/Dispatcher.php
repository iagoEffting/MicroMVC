<?php

namespace IagoEffting\MicroMVC;

Trait Dispatcher {

  //public function dispatch($route, $request, $response)
  public function dispatch($request, $response)
  {
    $routeSelected = $this->getUriRoute($request->uri);

    $controller = new $routeSelected['Controller']();
    $action = $routeSelected['Action'];

    echo $controller->$action($request, $response);
  }

  private function getUriRoute($uri)
  {

    foreach ($this['routes'] as $route) {

      if ($route['path'] == $uri) {
        return $route;
      }

    }

  }
}