<form action="<?php echo $url ?>" method="post">
  <div class="row">
    <div class="input-field col s12">
      <i class="material-icons prefix orange-text text-accent-3">monetization_on</i>
      <input id="title" name="title" type="number" class="validate" value="<?php echo $funding->amount ?>" min="0">
      <label for="title">Amount (SGD)</label>
    </div>

  <button type="submit" class="btn right light-blue lighten-1">Submit</button>
</form>

<script src="<?php echo URL; ?>js/project.js"></script>
