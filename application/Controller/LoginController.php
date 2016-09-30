<?php

namespace Mini\Controller;

use Mini\Model\User;

class LoginController extends ApplicationController
{

  public function index()
  {
    if ($this->User->loggedIn()) {
      header('Location:' . URL);
      return;
    }

    include APP . 'view/_templates/header.php';
    include APP . 'view/login/index.php';
    include APP . 'view/_templates/footer.php';
  }

  public function login()
  {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
      header('Location:' . URL . 'error');
      return;
    }

    $email = $_POST['email'];
    $password = $_POST['password'];
    $remember = $_POST['remember'];

    $this->User->login($email, $password, $remember);
  }

  public function logout()
  {
    if ($this->User->loggedIn()) {
      $this->User->logout();
    }

    header('Location:' . URL);
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
