<?php

namespace Mini\Controller;

class HomeController extends ApplicationController
{
  public function index()
  {
    if($this->User->loggedIn()){
      header('Location: ' . URL . 'projects');
    } else {
      include APP . 'view/_templates/header.php';
      include APP . 'view/home/index.php';
      include APP . 'view/_templates/footer.php';
    }
  }
}
