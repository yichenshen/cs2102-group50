<?php

namespace Mini\Controller;

use Mini\Model\Project;

class ProjectsController
{
  /**
   * PAGE: index
   * This method handles what happens when you move to http://yourproject/songs/index
   */
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

  public function edit($projectId){
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

  /**
   * ACTION: editSong
   * This method handles what happens when you move to http://yourproject/songs/editsong
   *
   * @param int $song_id Id of the to-edit song
   */
  public
  function editSong($song_id)
  {
    // if we have an id of a song that should be edited
    if (isset($song_id)) {
      // Instance new Model (Song)
      $Song = new Song();
      // do getSong() in model/model.php
      $song = $Song->getSong($song_id);

      // in a real application we would also check if this db entry exists and therefore show the result or
      // redirect the user to an error page or similar

      // load views. within the views we can echo out $song easily
      include APP . 'view/_templates/header.php';
      include APP . 'view/songs/edit.php';
      include APP . 'view/_templates/footer.php';
    } else {
      // redirect user to songs index page (as we don't have a song_id)
      header('location: ' . URL . 'songs/index');
    }
  }

  /**
   * ACTION: updateSong
   * This method handles what happens when you move to http://yourproject/songs/updatesong
   * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "update a song" form on songs/edit
   * directs the user after the form submit. This method handles all the POST data from the form and then redirects
   * the user back to songs/index via the last line: header(...)
   * This is an example of how to handle a POST request.
   */
  public
  function updateSong()
  {
    // if we have POST data to create a new song entry
    if (isset($_POST["submit_update_song"])) {
      // Instance new Model (Song)
      $Song = new Song();
      // do updateSong() from model/model.php
      $Song->updateSong($_POST["artist"], $_POST["track"], $_POST["link"], $_POST['song_id']);
    }

    // where to go after song has been added
    header('location: ' . URL . 'songs/index');
  }

  /**
   * AJAX-ACTION: ajaxGetStats
   * TODO documentation
   */
  public
  function ajaxGetStats()
  {
    // Instance new Model (Song)
    $Song = new Song();
    $amount_of_songs = $Song->getAmountOfSongs();

    // simply echo out something. A supersimple API would be possible by echoing JSON here
    echo $amount_of_songs;
  }

}
