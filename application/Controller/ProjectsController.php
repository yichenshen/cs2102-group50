<?php

namespace Mini\Controller;

use Mini\Model\Project;

class ProjectsController
{
  public function index()
  {
    $Project = new Project();
    $projects = $Project->getAllProjects();

    // load views. within the views we can echo out $songs and $amount_of_songs easily
    include APP . 'view/_templates/header.php';
    include APP . 'view/projects/index.php';
    include APP . 'view/_templates/footer.php';
  }

  public function newproject()
  {
    $Project = new Project();
    $project = $Project->blankProject();

    include APP . 'view/_templates/header.php';
    include APP . 'view/projects/new.php';
    include APP . 'view/_templates/footer.php';
  }

  public function edit($projectId)
  {
    $Project = new Project();
    $project = $Project->getProject($projectId);

    include APP . 'view/_templates/header.php';
    include APP . 'view/projects/edit.php';
    include APP . 'view/_templates/footer.php';
  }

  // POST
  public function create()
  {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
      header('Location:' . URL . 'error');
      return;
    }

    $Project = new Project();

    $title = $_POST['title'];
    $description = $_POST['description'];
    $startDate = $_POST['start_date'] ?: date('Y/m/d');
    $endDate = $_POST['end_date'] ?: date('Y/m/d');
    $amount = $_POST['amount'] ?: 1;

    //TODO: fill up empty fields.
    $newID = $Project->addProject(null, $title, $description, $startDate, $endDate, null, $amount);

    header('Location:' . URL . 'projects/');
  }

  public function update($projectID)
  {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
      header('Location:' . URL . 'error');
      return;
    }

    $Project = new Project();

    $title = $_POST['title'];
    $description = $_POST['description'];
    $startDate = $_POST['start_date'];
    $endDate = $_POST['end_date'];
    $amount = $_POST['amount'];

    //TODO: fill up empty fields.
    $newID = $Project->updateProject(null, $title, $description, $startDate, $endDate, null, $amount, $projectID);

    header('Location:' . URL . 'projects/');
  }

  // POST
  public function delete($projectId)
  {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
      header('Location:' . URL . 'error');
      return;
    }

    if (isset($projectId)) {
      $Project = new Project();
      $Project->deleteProject($projectId);
    }

    header('location: ' . URL . 'projects');
  }
}
