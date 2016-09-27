<form action="/projects/create" method="post">
  <div class="row">
    <div class="input-field col s12">
      <input id="title" name="title" type="text" class="validate" value="<?php echo $project->title ?>">
      <label for="title">Project Title</label>
    </div>
    <div class="input-field col s12">
      <textarea id="description" name="description"
                class="materialize-textarea"><?php echo $project->description ?></textarea>
      <label for="description">Description</label>
    </div>
    <div class="input-field col s6">
      <input id="start_date" name="start_date" type="date" class="datepicker" value="<?php echo $project->start_date ?>">
      <label for="start_date">Start Date</label>
    </div>
    <div class="input-field col s6">
      <input id="end_date" name="end_date" type="date" class="datepicker" value="<?php echo $project->end_date ?>">
      <label for="amount">End Date</label>
    </div>
  </div>
  <div class="input-field col s6">
    <input id="amount" name="amount" type="number" class="validate" value="<?php echo $project->amount ?>">
    <label for="amount">Target Funding (SGD)</label>
  </div>
  <button type="submit" class="btn right light-blue lighten-1">Submit</button>
</form>

<script src="<?php echo URL; ?>js/project.js"></script>
