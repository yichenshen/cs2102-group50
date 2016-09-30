<?php

namespace Mini\Controller;

use Mini\Model\User;

class ApplicationController
{
  protected $User = null;

  public function __construct()
  {
    $this->User = new User();
  }
}
