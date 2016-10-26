<?php

namespace Mini\Controller;

use Mini\Model\Project;

class AdminController extends ApplicationController
{

  public function index()
  {
    if (!$this->User->loggedIn()) {
      header('Location: ' . URL . 'login');
    }

    $Project = new Project();
    $projects = $Project->ofOwner($this->User->currentUserEmail());

    require APP . 'view/_templates/header.php';
    require APP . 'view/admin/index.php';
    require APP . 'view/_templates/footer.php';
  }
}
