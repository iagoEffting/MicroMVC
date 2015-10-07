<?php

namespace IagoEffting\MicroMVC\View;

use IagoEffting\MicroMVC\Contracts\View\ViewInterface;

abstract class BaseModel implements ViewInterface
{

  protected $config;
  protected $basePath;

  public function setViewContext($container)
  {
    $this->config = $container;
    $this->basePath = $container['basePath'];
  }

}