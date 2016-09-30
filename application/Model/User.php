<?php

namespace Mini\Model;

use Delight\Auth\InvalidEmailException;
use Delight\Auth\InvalidPasswordException;
use Delight\Auth\TooManyRequestsException;
use Delight\Auth\UserAlreadyExistsException;
use Mini\Core\Model;
use Delight\Auth\Auth;

class User extends Model
{

  private $auth = null;

  public function __construct()
  {
    parent::__construct();

    $this->auth = new Auth($this->db);
  }

  public function register($email, $password)
  {
    try {
      $userId = $auth->register($email, $password, null, null);
    } catch (InvalidEmailException $e) {
      // invalid email address
    } catch (InvalidPasswordException $e) {
      // invalid password
    } catch (UserAlreadyExistsException $e) {
      // user already exists
    } catch (TooManyRequestsException $e) {
      // too many requests
    }
  }

  public function login($email, $password, $persist)
  {
    try {
      $auth->login($email, $password, $persist);
    } catch (InvalidEmailException $e) {
      // wrong email address
    } catch (InvalidPasswordException $e) {
      // wrong password
    } catch (TooManyRequestsException $e) {
      // too many requests
    }
  }

  public function loggedIn()
  {
    return $auth->isLoggedIn();
  }
}
