<?php

namespace Mini\Model;

use Delight\Auth\InvalidEmailException;
use Delight\Auth\InvalidPasswordException;
use Delight\Auth\TooManyRequestsException;
use Delight\Auth\UserAlreadyExistsException;
use Mini\Core\Model;
use Delight\Auth\Auth;
use Mini\Exception\LoginException;
use Mini\Exception\SignUpException;

class User extends Model
{

  private $auth = null;

  public function __construct()
  {
    parent::__construct();

    $this->auth = new Auth($this->db);
  }

  //TODO enter the name later
  public function register($name, $email, $password, $password_confirmation)
  {
    if ($password !== $password_confirmation) {
      throw new SignUpException("Password does not match confirmation!");
    }

    try {
      $userId = $this->auth->register($email, $password, null);
    } catch (InvalidEmailException $e) {
      throw new SignUpException("Email is invalid! Please use a proper email.");
    } catch (InvalidPasswordException $e) {
      throw new SignUpException("Email/Password is invalid! Please try again");
    } catch (TooManyRequestsException $e) {
      throw new SignUpException("Login tries exceeded, try again later.");
    } catch (UserAlreadyExistsException $e) {
      throw new SignUpException("Email has already been taken.");
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

  public function currentUserId(){
    return $this->auth->getUserId();
  }
}
