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
      <?php foreach ($projects as $project) {
        include '_project.php';
      } ?>
      </tbody>
    </table>
  </div>
</div>
