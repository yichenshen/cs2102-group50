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
}
