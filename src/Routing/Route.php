<?php

namespace MicroMVC\Routing;

use MicroMVC\Contracts\Http\Request as RequestInterface;

class Route
{

  public function __construct($path, $controllerClass) {
    $this->path = $path;
    $this->controllerClass = $controllerClass;
  }

  public function match(RequestInterface $request) {
    return $this->path === $request->getUri();
  }

  public function createController() {
    return new $this->controllerClass();
  }
}