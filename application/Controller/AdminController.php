<?php

namespace Mini\Controller;

class AdminController extends ApplicationController
{

  public function index()
  {
    if (!$this->User->loggedIn()) {
      header('Location: ' . URL . 'login');
    }

    require APP . 'view/_templates/header.php';
    require APP . 'view/admin/index.php';
    require APP . 'view/_templates/footer.php';
  }
}
