(function ($) {

  $(function () {
    $('.pie-canvas').each(function (index, elem) {
      var total = $(elem).data('total');
      var amount = $(elem).data('amount');

      var data = {
        labels: [
          "Raised",
          "Needed",
        ],
        datasets: [
          {
            data: [amount, total - amount],
            backgroundColor: [
              "#ff8f00",
              "#9e9e9e"
            ],
            borderColor: [
              "#ff8f00",
              "#9e9e9e"
            ],
            hoverBorderColor: [
              "#ffb300",
              "#bdbdbd "
            ],
            hoverBackgroundColor: [
              "#ffb300",
              "#bdbdbd"
            ]
          }]
      };

      new Chart(elem, {
        type: 'doughnut',
        data: data
      });
    });
  });
}(jQuery));



