<?php

namespace Mini\Model;

use Mini\Core\Model;

class Funding extends Model
{

  public function fundingsForProject($project_id)
  {
    $sql = "SELECT * FROM fundings f, users u WHERE f.funder = u.email AND project_id = :pid";
    $query = $this->db->prepare($sql);
    $parameters = array(':pid' => $project_id);

    $query->execute($parameters);
    return $query->fetchAll();
  }

  public function totalAmount($project_id)
  {
    $sql = "SELECT sum(amount) AS total_amount FROM fundings WHERE project_id = :pid";
    $query = $this->db->prepare($sql);
    $parameters = array(':pid' => $project_id);

    $query->execute($parameters);
    return $query->fetch();
  }

  //TODO check for prescene of project
  public function addFunding($projectId, $email, $amount)
  {
    $sql = "INSERT INTO fundings (project_id, funder, amount) VALUES (:pid, :email, :amount)";
    $query = $this->db->prepare($sql);

    $parameters = array(':pid' => $projectId, ':email' => $email, ':amount' => $amount);
    $query->execute($parameters);

    return $this->db->lastInsertId('fundings_id_seq');
  }

  public function deleteFunding($id)
  {
    $sql = "DELETE FROM fundings WHERE id = :id";
    $query = $this->db->prepare($sql);
    $parameters = array(':id' => $id);

    $query->execute($parameters);
  }

  public function blankFunding()
  {
    $funding = new \stdClass();
    $funding->amount = 5.0;

    return $funding;
  }
}
