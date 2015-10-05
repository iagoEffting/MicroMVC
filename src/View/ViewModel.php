<?php

namespace IagoEFfting\MicroMVC\View;

use IagoEffting\MicroMVC\View\BaseModel;

class ViewModel extends BaseModel
{

  public $view;

  public function __construct($viewModel)
  {
    $this->view = $viewModel;
  }

  public function __toString()
  {

    if ($this->config['config']['view']['template_view']) {

      $base = realpath($this->basePath);
      $file = $this->config['config']['view']['template_file'];

      $file = $base.'/'.$file;
      include $file;

      return '';
    }

    return $this->view;
  }

  public function content()
  {
    $base = realpath($this->basePath);
    $path = $this->config['config']['view']['path_views'];

    $path = $base.'/'.$path."/".$this->view.'.php';
    include $path;
  }

}