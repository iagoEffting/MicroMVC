<?php

namespace IagoEffting\MicroMVC;

use IagoEffting\MicroMVC\Http\Response;
use IagoEffting\MicroMVC\Dispatcher as DispatcherTrait;
use Pimple\Container as Pimple;

class Application extends Pimple
{
  use DispatcherTrait;

  private $request;

  protected $basePath;

  public function __construct($basePath) {
    $this->setBasePath($basePath);
  }

  public function run() {
    $this->dispatch($this->request, new Response());
  }

  private function getRoutes()
  {

    $routes = array();

    foreach ($this->offsetGet('routes') as $route) {
      $routes[] = new \IagoEffting\MicroMVC\Routing\Route($route['path'], $route['Controller']);
    }

    return $routes;
  }

  public function setBasePath($basePath)
  {
    $this->offsetSet('basePath', $basePath);
    $this->basePath = $basePath;
  }

  public function basePath()
  {
    return $this->basePath;
  }

  public function setRequest($request)
  {
    $this->request = $request;
  }

  public function setConfigs($pathConfigs)
  {
    $directory = dir($pathConfigs);
    $configs = array();

    while ($file = $directory->read()) {

      if ($file != '.' && $file != '..') {
        $name = str_replace('.php', '', $file);
        $configs[$name] = include $pathConfigs.$file;
      }

    }
    $directory->close();
    $this['config'] = $configs;

  }

  public function setProviders($pathProviders)
  {

    foreach ($this['config']['app']['providers'] as $provider) {
      $this->register(new $provider());
    }

  }

}