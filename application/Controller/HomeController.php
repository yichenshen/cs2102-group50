<?php

namespace Mini\Controller;

class HomeController
{
  public function index()
  {
    //TODO add a landing page
    header('Location: ' . URL . 'projects');
  }
}
