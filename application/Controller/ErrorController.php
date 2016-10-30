<?php

namespace Mini\Controller;

class ErrorController extends ApplicationController
{

  public function index()
  {
    // load views
    require APP . 'view/_templates/header.php';
    require APP . 'view/error/index.php';
    require APP . 'view/_templates/footer.php';
  }

  public function notfound()
  {
    $error_msg = 'Page does not exist!';

    $this->index();
  }

  public function unauthorized()
  {
    $error_msg = 'You are not authorized to perform this action!';

    $this->index();
  }
}
