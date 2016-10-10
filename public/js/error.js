$(function () {
  $('#error-dismiss').click(function () {
    $("#error-panel").fadeOut(300, function () {
      $(this).remove();
    });
  });
});
