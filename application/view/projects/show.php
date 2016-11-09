<div class="container">

  <img class="materialboxed centered-image"
       src="<?php echo $project->display_image ?: '/img/filler.jpg' ?>">


  <?php if ($this->User->authorizeEmail($project->owner)): ?>
    <div class="right">
      <form action="/projects/delete/<?php echo $project->id; ?>" method="post">
        <a class="btn btn-floating btn-large primary-accent-dark" href="/projects/edit/<?php echo $project->id; ?>">

          <i class="material-icons">edit</i>
        </a>
        <button type="submit" class="btn btn-floating btn-large red accent-2">
          <i class="material-icons">delete</i>
        </button>

      </form>
    </div>
  <?php endif ?>
  <h1><?php echo $project->title ?></h1>

  <h5>
    <?php echo $project->category ?>
  </h5>
  <br />
  <p>
    From <?php echo $project->start_date ?> to <?php echo $project->end_date ?>
  </p>

  <p><?php echo nl2br(htmlspecialchars($project->description)) ?></p>

  <div class="divider"></div>

  <?php if ($this->User->loggedIn()) { ?>
    <h3>Contribute!</h3>
    <?php $url = '/fundings/create/' . $project->id ?>
    <?php include APP . 'view/fundings/_form.php' ?>
  <?php } else { ?>
    <br/>
    <div class="center">
      <a href="/login"
         class="btn-large waves-effect waves-light secondary-accent">Log in to contribute!</a>
    </div>
    <br/>
  <?php } ?>

</div>
