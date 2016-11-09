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
              "#2196F3"
            ],
            borderColor: [
              "#ff8f00",
              "#2196F3"
            ],
            hoverBorderColor: [
              "#ffb300",
              "#64B5F6"
            ],
            hoverBackgroundColor: [
              "#ffb300",
              "#64B5F6"
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



