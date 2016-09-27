<div class="container">
  <h1><?php echo $project->title ?></h1>
  <?php $url = '/projects/update/' . $project->id  ?>
  <?php include '_form.php' ?>
</div>
