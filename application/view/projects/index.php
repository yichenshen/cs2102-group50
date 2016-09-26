<div class="container">
  <h1>Projects</h1>

  <!-- main content output -->
  <div class="box">
    <table>
      <thead>
        <tr>
          <td>Title</td>
          <td>Description</td>
          <td>Start Date</td>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($projects as $project) { ?>
          <tr>
            <?php $project->title ?>
          </tr>
          <tr>
            <?php $project->title ?>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
