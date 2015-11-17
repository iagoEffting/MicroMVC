<?php

namespace IagoEffting\MicroMVC\Reflection;

class Reflection
{

    public static function getMethods($className)
    {
        $modelReflector = new \ReflectionClass($className);

        return $modelReflector->getMethods();

    }

}