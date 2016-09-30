<?php

namespace Mini\Exception;

use \Exception;

class LoginException extends Exception
{
  // Redefine the exception so message isn't optional
  public function __construct($message)
  {
    parent::__construct($message);
  }

  // custom string representation of object
  public function __toString()
  {
    return $this->message;
  }
}
