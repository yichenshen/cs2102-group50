<div class="col s12 m6 l4" xmlns="http://www.w3.org/1999/html">
  <div class="card medium">
    <div class="card-image waves-effect waves-block waves-light">
      <a href="/projects/show/<?php echo $project->id ?>">
        <img src="<?php echo $project->display_image ?: '/img/filler.jpg' ?>">
      </a>
    </div>
    <div class="card-content">
      <span class="card-title grey-text text-darken-4">
        <a href="/projects/show/<?php echo $project->id ?>" class="black-text">
          <?php echo htmlspecialchars($project->title) ?>
        </a>
        <a href="#" class="black-text activator">
          <i class="material-icons right">more_vert</i>
        </a>
      </span>
      <?php
      $progress = ($project->amount_raised ?: 0) / ($project->amount) * 100;
      ?>
      <p>
        $<?php echo($project->amount_raised ?: 0) ?>/$<?php echo $project->amount; ?>
        (<?php echo $progress; ?>%)
      </p>
      <div class="progress">
        <div class="determinate primary-700" style="width: <?php echo $progress > 100 ? 100 : $progress; ?>%"></div>
      </div>

    </div>
    <div class="card-reveal secondary-300">
      <span class="card-title grey-text text-darken-4">
        <?php echo htmlspecialchars($project->title) ?>
        <i class="material-icons right">close</i></span>
      <p>From <?php echo htmlspecialchars($project->start_date) ?>
        to <?php echo htmlspecialchars($project->end_date) ?></p>
      <p><?php echo nl2br(htmlspecialchars($project->description)) ?></p>
    </div>
  </div>
</div>
