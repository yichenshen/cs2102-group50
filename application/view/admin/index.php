<div class="container">
  <h1><?php echo $this->User->currentUserName() ?></h1>

  <?php foreach ($projects as $project) {
    include APP . 'view/projects/_project.php';
  } ?>

</div>
