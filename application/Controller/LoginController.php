<?php

namespace Mini\Controller;

use Mini\Model\User;

class LoginController extends ApplicationController
{

  public function login()
  {
    if ($this->User->loggedIn()) {
      header('Location:' . URL);
      return;
    }
  }

  public function logout()
  {

  }

  public function register()
  {

  }

  public function createuser()
  {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
      header('Location:' . URL . 'error');
      return;
    }


  }
}
