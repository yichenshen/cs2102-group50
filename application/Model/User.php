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

  public function register($username, $email, $password)
  {
    $auth = new Auth($this->db);
    try {
      $userId = $auth->register($email, $password, $username, null);
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

  public function login($username, $password, $persist)
  {
    try {
      $auth = new Auth($this->db);
      $auth->login($username, $password, $persist);
    } catch (InvalidEmailException $e) {
      // wrong email address
    } catch (InvalidPasswordException $e) {
      // wrong password
    } catch (TooManyRequestsException $e) {
      // too many requests
    }
  }
}
