<?php

namespace Mini\Controller;

use Mini\Model\Funding;

class FundingsController extends ApplicationController
{
  public function newfunding($projectId)
  {
    if (!$this->User->loggedIn() || !isset($projectId)) {
      header('Location: ' . URL);
      return;
    }

    $Funding = new Funding();
    $funding = $Funding->blankFunding();

    include APP . 'view/_templates/header.php';
    include APP . 'view/fundings/new.php';
    include APP . 'view/_templates/footer.php';
  }

  public function create($projectId)
  {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
      header('Location:' . URL . 'error');
      return;
    }

    if (!$this->User->loggedIn() || !isset($projectId)) {
      header('Location: ' . URL);
      return;
    }

    $Funding = new Funding();

    $amount = $_POST['amount'];
    $uid = $this->User->currentUserEmail();

    $newID = $Funding->addFunding($projectId, $uid, $amount);

    header('Location:' . URL . 'projects/');
  }
}

