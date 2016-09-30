<div id="error-panel" class="card-panel red white-text">
  <i class="material-icons icon-align">error</i>
  <?php echo $error; ?>
  <a href="#" id="error-dismiss" class="white-text"><i class="material-icons right">clear</i></a>
</div>

<script>
  $(function() {
   $('#error-dismiss').click(function () {
     $("#error-panel").fadeOut(300, function() {
       $(this).remove();
     });
   });
  });
</script>
