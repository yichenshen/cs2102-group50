<?php

namespace Mini\Controller;

use Mini\Model\Funding;

class FundingsController extends ApplicationController
{
  public function newfunding($project_id)
  {
    if (!$this->User->loggedIn() || !isset($project_id)) {
      header('Location: ' . URL);
    }

    $Funding = new Funding();
    $funding = $Funding->blankFunding();

    include APP . 'view/_templates/header.php';
    include APP . 'view/fundings/new.php';
    include APP . 'view/_templates/footer.php';
  }
}

