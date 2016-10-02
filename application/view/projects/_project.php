<tr>
  <td><?php echo htmlspecialchars($project->title) ?></td>
  <td><?php echo htmlspecialchars($project->description) ?></td>
  <td><?php echo htmlspecialchars($project->start_date) ?></td>
  <td><?php echo htmlspecialchars($project->end_date) ?></td>
  <td><?php echo htmlspecialchars($project->amount) ?></td>
  <td>
    <form action="/projects/delete/<?php echo $project->id ?>" method="post">
      <a class="btn-floating primary-accent" href="/fundings/<?php echo $project->id ?>">
        <i class="material-icons">attach_money</i>
      </a>
      <a class="btn-floating light-green" href="/projects/edit/<?php echo $project->id ?>">
        <i class="material-icons">edit</i>
      </a>
      <button class="btn-floating red accent-2" type="submit" name="action">
        <i class="material-icons">delete</i>
      </button>
    </form>
  </td>
</tr>

