<div class="container">
  <?php if ($this->User->loggedIn()) { ?>
    <a href="/projects/newproject" class="btn-floating btn-large right secondary-accent">
      <i class="material-icons">add</i>
    </a>
  <?php } ?>
  <h1>Projects</h1>
  <!-- main content output -->
  <div class="row">
    <?php foreach ($projects as $project) {
      include '_project.php';
    } ?>
  </div>
</div>
