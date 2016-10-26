<?php

namespace Mini\Model;

use Mini\Core\Model;

class Project extends Model
{

  const categories = array('Art', 'Charity', 'Crafts', 'Design', 'Technology', 'Others');

  public function getAllProjects()
  {
    $sql = "SELECT * FROM projects";
    $query = $this->db->prepare($sql);
    $query->execute();

    return $query->fetchAll();
  }

  public function addProject($owner, $title, $description, $startDate, $endDate, $category, $amount)
  {
    $sql = "INSERT INTO projects (owner, title, description, start_date, end_date, category, amount) VALUES (:owner, :title, :description, :startDate, :endDate, :category, :amount)";
    $query = $this->db->prepare($sql);

    $parameters = array(':owner' => $owner, ':title' => $title, ':description' => $description, ':startDate' => $startDate, ':endDate' => $endDate, ':category' => $category, ':amount' => $amount);

    $query->execute($parameters);

    return $this->db->lastInsertId('projects_id_seq');
  }

  public function changeDisplay($projectId, $filePath)
  {
    $sql = "UPDATE projects SET display_image = :file WHERE id = :id";
    $query = $this->db->prepare($sql);

    $parameters = array(':file' => $filePath, ':id' => $projectId);

    $query->execute($parameters);
  }

  public function deleteProject($id)
  {
    $sql = "DELETE FROM projects WHERE id = :id";
    $query = $this->db->prepare($sql);
    $parameters = array(':id' => $id);

    $query->execute($parameters);
  }

  public function getProject($id)
  {
    $sql = "SELECT * FROM projects WHERE id = :id LIMIT 1";
    $query = $this->db->prepare($sql);
    $parameters = array(':id' => $id);

    $query->execute($parameters);

    return $query->fetch();
  }

  public function updateProject($title, $description, $start_date, $end_date, $category, $amount, $id)
  {
    $sql = "UPDATE projects SET title = :title, description = :description, start_date = :start_date, end_date = :end_date, category = :category, amount = :amount WHERE id = :id";
    $query = $this->db->prepare($sql);

    $parameters = array(':title' => $title, ':description' => $description, ':start_date' => $start_date, ':end_date' => $end_date, ':category' => $category, ':amount' => $amount, ':id' => $id);

    $query->execute($parameters);
  }

  public function ofOwner($email)
  {
    $sql = "SELECT p.*, SUM(f.amount) AS amount_raised FROM projects p LEFT JOIN fundings f ON p.id = f.project_id WHERE owner = :email GROUP BY p.id";
    $query = $this->db->prepare($sql);
    $parameters = array(':email' => $email);

    $query->execute($parameters);

    return $query->fetchAll();
  }

  public function isOwner($email, $projectId)
  {
    $sql = "SELECT owner FROM projects WHERE id = :projectId";
    $query = $this->db->prepare($sql);

    $parameters = array(':projectId' => $projectId);
    $query->execute($parameters);

    $owner = $query->fetch()->owner;

    return $owner === $email;
  }

  public function blankProject()
  {
    $project = new \stdClass();
    $project->title = null;
    $project->description = null;
    $project->start_date = null;
    $project->end_date = null;
    $project->category = null;
    $project->amount = null;

    return $project;
  }

}
