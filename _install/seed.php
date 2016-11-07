<?php

define('NUM_USERS', 50);
define('NUM_PROJECTS', 100);

define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);
define('APP', ROOT . 'application' . DIRECTORY_SEPARATOR);
define('DB_TYPE', 'pgsql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'cs2102');
define('DB_USER', 'postgres');
define('DB_PASS', 'postgres');

require ROOT . 'vendor/autoload.php';

use Mini\Model\Project;
use Mini\Model\User;
use Mini\Model\Funding;
use Faker\Factory;

$faker = Factory::create();

$User = new User();
$Project = new Project();
$Funding = new Funding();

$emails = array();

echo "Seeding users";
for ($x = 0; $x <= 50; $x++) {
  $email = $faker->email;
  $User->register($faker->name, $email, $email, $email);

  array_push($emails, $email);
}
