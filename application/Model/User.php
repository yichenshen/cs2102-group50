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

    if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }
  }

  public function register($name, $email, $password, $password_confirmation)
  {
    if ($password !== $password_confirmation) {
      throw new SignUpException("Password does not match confirmation!");
    }

    $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
    $query = $this->db->prepare($sql);
    $parameters = array(':email' => $email, ':name'=>$name, ':password'=> password_hash($password, PASSWORD_BCRYPT));

    if(!$query->execute($parameters)){
      throw new SignUpException("Email has already been taken.");
    }
  }

  public function login($email, $password)
  {
    $sql = "SELECT name, email, password, is_admin FROM users WHERE email = :email";
    $query = $this->db->prepare($sql);
    $parameters = array(':email' => $email);

    $query->execute($parameters);
    $account = $query->fetch();

    if ($account === false) {
      # No such account
      throw new LoginException("Email/Password is invalid! Please try again");
    }

    if (!password_verify($password, $account->password)) {
      # Wrong password
      throw new LoginException("Email/Password is invalid! Please try again");
    }

    $_SESSION['login_user'] = $account;
  }

  public function logout()
  {
    session_destroy();
  }

  public function loggedIn()
  {
    return isset($_SESSION['login_user']);
  }

  public function currentUserEmail()
  {
    if(!$this->loggedIn()){
      throw new  LoginException('No user logged in!');
    }

    return $_SESSION['login_user']->email;
  }
}
