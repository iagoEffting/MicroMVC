<?php

namespace MicroMVC;

Trait Dispatcher {

  public function dispatch($route, $request, $response)
  {
    $controller = $route->createController();

    echo $controller->index($request, $response);
  }
}