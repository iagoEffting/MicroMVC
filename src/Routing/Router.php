<?php

namespace IagoEFfting\MicroMVC\Routing;

class Router {

  protected $routes;

  public function getRoutes() {
    return $this->routes;
  }

  public function getRoute($uri)
  {
    var_dump($this);
  }

}