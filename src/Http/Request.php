<?php

namespace IagoEffting\MicroMVC\Http;

use IagoEffting\MicroMVC\Contracts\Http\Request as RequestInterface;

class Request implements RequestInterface
{

  public function __construct($uri, $params = array()) {
    $this->uri = $uri;
    $this->params = $params;
  }

  public function getUri() {
    return $this->uri;
  }

  public function setParam($key, $value) {
    $this->params[$key] = $value;
    return $this;
  }

  public function getParam($key) {
    if (!isset($this->params[$key])) {
      throw new \InvalidArgumentException("A requisição do parâmetro da chave '$key' é inválido.");
    }
    return $this->params[$key];
  }

  public function getParams() {
    return $this->params;
  }
}