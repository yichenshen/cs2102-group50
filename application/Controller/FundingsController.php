<?php

namespace Mini\Controller;

class FundingsController extends ApplicationController
{
  public function newfunding($project_id)
  {
    if (!$this->User->loggedIn() || !isset($project_id)) {
      header('Location: ' . URL);
    }

    include APP . 'view/_templates/header.php';
    include APP . 'view/fundings/new.php';
    include APP . 'view/_templates/footer.php';
  }
}

