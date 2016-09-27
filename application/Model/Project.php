<?php

/**
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */

namespace Mini\Model;

use Mini\Core\Model;

class Project extends Model {
    public function getAllProjects() {
        $sql = "SELECT * FROM projects";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // core/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll();
    }

    public function addProject($owner, $title, $description, $start_date, $end_date, $categories, $amount) {
        $sql = "INSERT INTO projects (owner, title, description, start_date, end_date, categories, amount) VALUES (:owner, :title, :description, :start_date, :end_date, :categories, :amount)";
        $query = $this->db->prepare($sql);

        $parameters = array(':owner' => $owner, ':title' => $title, ':description' => $description, ':start_date' => $start_date, ':end_date' => $end_date, ':categories' => $categories, ':amount' => $amount);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);

        return $this->db->lastInsertId('projects_id_seq');
    }

    public function deleteProject($id)
    {
        $sql = "DELETE FROM projects WHERE id = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    public function getProject($id)
    {
        $sql = "SELECT * FROM projects WHERE id = :id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);

        // fetch() is the PDO method that get exactly one result
        return $query->fetch();
    }

    public function updateProject($owner, $title, $description, $start_date, $end_date, $categories, $amount, $id) {
        $sql = "UPDATE projects SET owner = :owner, title = :title, description = :description, start_date = :start_date, end_date = :end_date, categories = :categories, amount = :amount)";
        $query = $this->db->prepare($sql);

        $parameters = array(':owner' => $owner, ':title' => $title, ':description' => $description, ':start_date' => $start_date, ':end_date' => $end_date, ':categories' => $categories, ':amount' => $amount);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

  public function blankProject()
  {
    $project = new \stdClass();
    $project->title = null;
    $project->description = null;
    $project->start_date = null;
    $project->end_date = null;
    $project->categories = null;
    $project->amount = null;

    return $project;
  }

  /**
     * Get simple "stats". This is just a simple demo to show
     * how to use more than one model in a controller (see application/controller/songs.php for more)
     */
    // public function getAmountOfSongs()
    // {
    //     $sql = "SELECT COUNT(id) AS amount_of_songs FROM song";
    //     $query = $this->db->prepare($sql);
    //     $query->execute();
    //
    //     // fetch() is the PDO method that get exactly one result
    //     return $query->fetch()->amount_of_songs;
    // }
}
