<?php

namespace IagoEffting\MicroMVC\Annotations;

use Pimple\Container;
use Pimple\ServiceProviderInterface as ServiceProvider;

class AnnotationsServiceProvider implements ServiceProvider
{

  protected $container;

  public function register(Container $container)
  {
    $this->container = $container;
  }


}