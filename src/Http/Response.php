<?php

namespace IagoEffting\MicroMVC\Http;

use IagoEffting\MicroMVC\Contracts\Http\Response as ResponseInterface;


class Response implements ResponseInterface
{
  public function __construct($version = '1') {
    $this->version = $version;
  }

  public function getVersion() {
    return $this->version;
  }

  public function addHeader($header) {
    $this->headers[] = $header;
    return $this;
  }

  public function addHeaders(array $headers) {
    foreach ($headers as $header) {
      $this->addHeader($header);
    }
    return $this;
  }

  public function getHeaders() {
    return $this->headers;
  }

  public function send() {
    if (!headers_sent()) {
      foreach($this->headers as $header) {
        header("$this->version $header", true);
      }
    }
  }
}