<div class="container">
  <a class="btn btn-floating btn-large secondary-500 right" href="/admin/edit">
    <i class="material-icons">edit</i>
  </a>
  <h1>
    <?php echo $this->User->currentUserName() ?>
    <?php if ($this->User->currentIsAdmin()) {
      echo '(Admin)';
    } ?>
  </h1>

  <p>
    <h5>Email: <?php echo $this->User->currentUserEmail(); ?></h5>
  </p>

  <br/>
  <br/>

  <h4>My Projects</h4>
  <div class="divider"></div>

  <?php foreach ($projects as $project) {
    include APP . 'view/projects/_stats.php';
  } ?>

</div>
