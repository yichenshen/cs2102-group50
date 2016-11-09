<div class="container">

  <img class="materialboxed centered-image"
       src="<?php echo $project->display_image ?: '/img/filler.jpg' ?>">
  <br/>
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
  <h2><?php echo $project->title ?></h2>

  <div class="divider"></div>

  <div class="row">
    <div class="pie-chart col s12 m4 l3">
      <canvas class="pie-canvas"
              height="300"
              data-total="<?php echo $project->amount ?>"
              data-amount="<?php echo($project->amount_raised ?: 0) ?>">
      </canvas>
    </div>
    <p>
    <div class="chip secondary-300">
      <?php echo $project->category ?>
    </div>
    <b>
      From <?php echo $project->start_date ?> to <?php echo $project->end_date ?>
    </b>
    <br />
    <b>
      Progress:
      $<?php echo($project->amount_raised ?: 0) ?>/$<?php echo $project->amount; ?>
      (<?php
      $progress = ($project->amount_raised ?: 0) / ($project->amount) * 100;
      echo $progress;
      ?>%)
    </b>
    </p>

    <p><?php echo nl2br(htmlspecialchars($project->description)) ?></p>
  </div>

  <div class="clear"></div>

  <?php if ($this->User->loggedIn() && $this->User->authorizeEmail($project->owner)) { ?>
    <?php include APP . 'view/fundings/_list.php' ?>
  <?php } elseif ($this->User->loggedIn()) { ?>
    <h3>Contribute!</h3>
    <div class="divider"></div>
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

<script src="<?php echo URL; ?>js/pie.js" async></script>
