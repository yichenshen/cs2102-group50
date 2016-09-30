<?php

namespace Mini\Controller;

class LoginController
{

  public function login()
  {

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
