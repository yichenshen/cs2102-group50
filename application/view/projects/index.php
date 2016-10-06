<div class="container">
  <a href="/projects/newproject" class="btn-floating btn-large light-green right">
    <i class="material-icons">add</i>
  </a>
  <h1>Projects</h1>
  <!-- main content output -->
  <div class="row">
      <?php foreach ($projects as $project) {
        include '_project.php';
      } ?>
  </div>
</div>
