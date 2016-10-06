<div class="col s12 m6 l4">
  <div class="card medium">
    <div class="card-image waves-effect waves-block waves-light">
      <img class="activator"
           src="<?php echo '/' . (!($project->display_image) ? 'img/filler.jpg' : $project->display_image) ?>">
    </div>
    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4">
        <?php echo htmlspecialchars($project->title) ?>
        <i class="material-icons right">more_vert</i></span>
      <p class="truncate"><?php echo htmlspecialchars($project->description) ?></p>
      <p><a href="#">Fund this project!</a></p>
    </div>
    <div class="card-reveal secondary-300">
      <span class="card-title grey-text text-darken-4">
        <?php echo htmlspecialchars($project->title) ?>
        <i class="material-icons right">close</i></span>
      <p>From <?php echo htmlspecialchars($project->start_date) ?>
        to <?php echo htmlspecialchars($project->end_date) ?></p>
      <p>Funding Sought: <?php echo htmlspecialchars($project->amount) ?></p>
      <p><?php echo nl2br(htmlspecialchars($project->description)) ?></p>
    </div>

    <!--    <div class="card-action">-->
    <!--      <div class="right">-->
    <!--        <form action="/projects/delete/--><?php //echo $project->id ?><!--" method="post">-->
    <!--          <a class="btn-floating primary-accent" href="/fundings/--><?php //echo $project->id ?><!--">-->
    <!--            <i class="material-icons">attach_money</i>-->
    <!--          </a>-->
    <!--          <a class="btn-floating light-green" href="/projects/edit/--><?php //echo $project->id ?><!--">-->
    <!--            <i class="material-icons">edit</i>-->
    <!--          </a>-->
    <!--          <button class="btn-floating red accent-2" type="submit" name="action">-->
    <!--            <i class="material-icons">delete</i>-->
    <!--          </button>-->
    <!--        </form>-->
    <!--      </div>-->
    <!--    </div>-->
  </div>
</div>
