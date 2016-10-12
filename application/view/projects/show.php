<div class="container">

  <img class="materialboxed centered-image"
       src="<?php echo '/' . (!($project->display_image) ? 'img/filler.jpg' : $project->display_image) ?>">

  <h1><?php echo $project->title ?></h1>

  <p>
    From <?php echo $project->start_date ?> to <?php echo $project->end_date ?>
  </p>

  <p><?php echo $project->description ?></p>

  <div class="divider"></div>

  <?php if ($this->User->loggedIn()) { ?>
    <h3>Contribute!</h3>
    <?php include APP . 'view/fundings/_form.php' ?>
  <?php } else { ?>
    <br />
    <div class="center">
      <a href="/login"
         class="btn-large waves-effect waves-light secondary-accent">Log in to contribute!</a>
    </div>
    <br />
  <?php } ?>

</div>
