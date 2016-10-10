<?php

namespace Mini\Controller;

use Mini\Model\Project;

class ProjectsController extends ApplicationController
{
  public function index()
  {
    $Project = new Project();
    $projects = $Project->getAllProjects();

    include APP . 'view/_templates/header.php';
    include APP . 'view/projects/index.php';
    include APP . 'view/_templates/footer.php';
  }

  public function show($projectId)
  {
    $Project = new Project();
    $project = $Project->getProject($projectId);

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
    $displayPic = $this->uploadFile($newID);
    $Project->changeDisplay($newID, $displayPic);

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

  private function uploadFile($projectId)
  {
    $target_dir = "uploads/" . $projectId . "/";
    $target_file = $target_dir . $_FILES["displayPic"]["name"];
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

    echo $_FILES["displayPic"]['error'];

    $check = getimagesize($_FILES["displayPic"]["tmp_name"]);

    if (empty($check)) {
      return null;
    }

    if (!is_dir($target_dir) && !mkdir($target_dir)){
      die("Error creating folder $target_dir");
    }

    if (move_uploaded_file($_FILES["displayPic"]["tmp_name"], $target_file)) {
      return $target_file;
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
}
