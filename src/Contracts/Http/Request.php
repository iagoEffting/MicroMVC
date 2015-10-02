<?php

namespace MicroMVC\Contracts\Http;

interface Request
{
  public function setParam($key, $value);
  public function getParam($key);
  public function getParams();
  public function getUri();
}