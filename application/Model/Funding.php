<?php

namespace Mini\Model;

use Mini\Core\Model;

class Funding extends Model
{

  public function fundingsForProject($project_id)
  {
    $sql = "SELECT * FROM fundings WHERE project_id = :pid";
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

  public function blankFunding()
  {
    $funding = new \stdClass();
    $funding->amount = 5.0;

    return $funding;
  }
}
