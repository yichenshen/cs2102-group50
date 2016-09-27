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
        <td>End Date</td>
        <td>Amount Needed</td>
        <td>Actions</td>
      </tr>
      </thead>
      <tbody>
      <?php foreach ($projects as $project) { ?>
        <tr>
          <td><?php echo htmlspecialchars($project->title) ?></td>
          <td><?php echo htmlspecialchars($project->description) ?></td>
          <td><?php echo htmlspecialchars($project->start_date) ?></td>
          <td><?php echo htmlspecialchars($project->end_date) ?></td>
          <td><?php echo htmlspecialchars($project->amount) ?></td>
          <td>
            <form action="/projects/delete/<?php echo $project->id ?>" method="post">
              <a class="btn-floating green lighten-1" href="/projects/edit/<?php echo $project->id ?>">
                <i class="material-icons">edit</i>
              </a>
              <button class="btn-floating red accent-2" type="submit" name="action">
                <i class="material-icons">delete</i>
              </button>
            </form>
          </td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
  </div>
</div>
