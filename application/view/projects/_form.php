<form action="<?php echo $url ?>" method="post" enctype="multipart/form-data">
  <div class="row">
    <div class="input-field col s12">
      <input id="title" name="title" type="text" class="validate" value="<?php echo $project->title ?>">
      <label for="title">Project Title</label>
    </div>
    <div class="file-field input-field col s12">
      <div class="btn secondary-accent">
        <span>Display Image</span>
        <input type="file" name="displayPic" id="displayPic" accept="image/*">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
      </div>
    </div>
    <div class="input-field col s12">
      <select name="category">
        <option value="" disabled <?php if (!$project->category) {
          echo 'selected';
        }; ?> >Choose a category
        </option>
        <?php foreach ($categories as $category): ?>
          <option value="<?php echo $category; ?>" <?php if ($project->category === $category) {
            echo 'selected';
          }; ?>><?php echo $category; ?></option>
        <?php endforeach; ?>
      </select>
      <label>Category</label>
    </div>
    <div class="input-field col s12">
      <textarea id="description" name="description"
                class="materialize-textarea"><?php echo $project->description ?></textarea>
      <label for="description">Description</label>
    </div>
    <div class="input-field col s6">
      <input id="start_date" name="start_date" type="date" class="datepicker"
             value="<?php echo $project->start_date ?>">
      <label for="start_date">Start Date</label>
    </div>
    <div class="input-field col s6">
      <input id="end_date" name="end_date" type="date" class="datepicker" value="<?php echo $project->end_date ?>">
      <label for="amount">End Date</label>
    </div>
    <div class="input-field col s6">
      <input id="amount" name="amount" type="number" class="validate" value="<?php echo $project->amount ?>">
      <label for="amount">Target Funding (SGD)</label>
    </div>
    <script>
      $(document).ready(function () {
        $('select').material_select();
      });
    </script>
  </div>


  <button type="submit" class="btn right secondary2-accent">Submit</button>
</form>

<script src="<?php echo URL; ?>js/project.js"></script>
