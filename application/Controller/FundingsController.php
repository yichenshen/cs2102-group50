<?php

namespace Mini\Controller;

class FundingsController
{
  public function index($project_id)
  {
    if (!$this->User->loggedIn()) {
      header('Location: ' . URL);
    }
  }
}
