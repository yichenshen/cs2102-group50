<div class="card horizontal primary-300">
  <div class="card-image">
    <img src="<?php echo $project->display_image ?: '/img/filler.jpg' ?>">
  </div>
  <div class="card-stacked">
    <div class="card-content">
      <span class="card-title">
        <a href="/projects/show/<?php echo $project->id ?>" class="black-text">
          <?php echo htmlspecialchars($project->title) ?>
        </a>
      </span>

      <span class="new badge secondary-700" data-badge-caption="<?php echo $project->category ?>"></span>
      <br/>
      Progress:
      $<?php echo($project->amount_raised ?: 0) ?>/$<?php echo $project->amount; ?>
      (<?php
        $progress = ($project->amount_raised ?: 0) / ($project->amount) * 100;
        echo $progress;
      ?>%)
      <div class="progress">
        <div class="determinate primary-700" style="width: <?php echo $progress > 100 ? 100 : $progress; ?>%"></div>
      </div>
      <p>
        <?php echo $project->description; ?>
      </p>
    </div>
    <div class="card-action">
      <a href="/projects/show/<?php echo $project->id ?>" class="btn secondary-accent">
        View
      </a>
    </div>
  </div>
</div>
