<?php

namespace Mini\Model;

use Delight\Auth\InvalidEmailException;
use Delight\Auth\InvalidPasswordException;
use Delight\Auth\TooManyRequestsException;
use Delight\Auth\UserAlreadyExistsException;
use Mini\Core\Model;
use Delight\Auth\Auth;
use Mini\Exception\LoginException;

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
      throw new LoginException("Email/Password is invalid! Please try again");
    } catch (InvalidPasswordException $e) {
      throw new LoginException("Email/Password is invalid! Please try again");
    } catch (TooManyRequestsException $e) {
      throw new LoginException("Login tries exceeded, try again later.");
    } catch (UserAlreadyExistsException $e) {
      // user already exists
    }
  }

  public function login($email, $password, $persist)
  {
    try {
      $this->auth->login($email, $password, $persist);
    } catch (InvalidEmailException $e) {
      throw new LoginException("Email/Password is invalid! Please try again");
    } catch (InvalidPasswordException $e) {
      throw new LoginException("Email/Password is invalid! Please try again");
    } catch (TooManyRequestsException $e) {
      throw new LoginException("Login tries exceeded, try again later.");
    }
  }

  public function logout()
  {
    $this->auth->logout();
  }

  public function loggedIn()
  {
    return $this->auth->isLoggedIn();
  }
}
