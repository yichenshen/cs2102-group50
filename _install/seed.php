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

echo "Seeding users\r\n";
for ($x = 0; $x < NUM_USERS; $x++) {
  $email = $faker->email;
  $User->register($faker->name, $email, $email, $email);

  array_push($emails, $email);
}

echo "Seeding projects\r\n";
for ($x = 0; $x < NUM_PROJECTS; $x++) {
  $email = $emails[array_rand($emails)];
  $start_date = $faker->dateTimeBetween($startDate = 'now', $endDate = '+1 month')->format('Y/m/d');
  $end_date = $faker->dateTimeBetween($startDate = 'now', $endDate = '+1 month')->format('Y/m/d');

  $category = Project::categories[array_rand(Project::categories)];

  $id = $Project->addProject(
    $email,
    $faker->catchPhrase,
    $faker->paragraphs(3, true),
    $start_date,
    $end_date,
    $category,
    rand(1, 1000) * 1000);

  $displayPic = $faker->imageUrl(1000, 600);

  $Project->changeDisplay($id, $displayPic);
}
