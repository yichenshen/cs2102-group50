<?php

define('NUM_USERS', 50);
define('NUM_PROJECTS', 100);
define('MAX_FUNDERS', 5);

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

echo "Seeding Users\r\n";
for ($x = 0; $x < NUM_USERS; $x++) {
  $email = $faker->email;
  $User->register($faker->name, $email, $email, $email);

  array_push($emails, $email);
}

$pids = array();

echo "Seeding Projects\r\n";
for ($x = 0; $x < NUM_PROJECTS; $x++) {
  $email = $emails[array_rand($emails)];
  $start_date = $faker->dateTimeBetween($startDate = 'now', $endDate = '+1 month')->format('Y/m/d');
  $end_date = $faker->dateTimeBetween($startDate = 'now', $endDate = '+1 month')->format('Y/m/d');

  $category = Project::categories[array_rand(Project::categories)];
  $amount = rand(1, 1000) * 1000;

  $id = $Project->addProject(
    $email,
    $faker->catchPhrase,
    $faker->paragraphs(3, true),
    $start_date,
    $end_date,
    $category,
    $amount);

  $displayPic = $faker->imageUrl(1000, 600);

  $target_dir = "/uploads/" . $id . "/";
  if (!is_dir($target_dir)) {
    mkdir('public/' . $target_dir);
  }

  $path = $target_dir . $id . '.jpg';

  file_put_contents('public' . $path, fopen($displayPic, 'r'));

  $Project->changeDisplay($id, $path);

  $pids[$id] = $amount;
}

echo "Seeding Fundings\r\n";
foreach ($pids as $pid => $amount) {
  $funded = rand(0, $amount);
  $funders = rand(1, 5);

  $cutoffs = array(0);

  for ($i = 0; $i < $funders; $i++) {
    array_push($cutoffs, rand(10, $amount));
  }

  sort($cutoffs);

  for ($i = 1; $i < sizeof($cutoffs); $i++) {
    $Funding->addFunding($pid, $emails[array_rand($emails)], $cutoffs[$i] - $cutoffs[$i - 1]);
  }
}

