<?php

namespace MicroMVC\Reflection;


class Reflection
{

  static public  function getMethods($className)
  {
    $modelReflector = new \ReflectionClass($className);

    return $modelReflector->getMethods();

  }

}