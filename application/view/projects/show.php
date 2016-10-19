<div class="container">

  <img class="materialboxed centered-image" width="800" src="<?php echo $project->display_image ?>">

  <h1><?php echo $project->title ?></h1>

  <p>
    From <?php echo $project->start_date ?> to <?php echo $project->end_date ?>
  </p>

  <p><?php echo $project->description ?></p>

  <div class="divider"></div>

  <h3>Contribute!</h3>
  <?php include APP . 'view/fundings/_form.php' ?>
</div>
