<?php

namespace IagoEffting\MicroMVC\Contracts\Http;


interface Response
{

    public function addHeader($header);
    public function addHeaders(array $headers);
    public function getHeaders();
    public function send();

}