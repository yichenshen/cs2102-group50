(function ($) {
  var data = {
    labels: [
      "Raised",
      "Needed",
    ],
    datasets: [
      {
        backgroundColor: [
          "#FFA000",
          "#2196F3",
        ],
        hoverBackgroundColor: [
          "#ffc107",
          "#64B5F6",
        ]
      }]
  };

  $(function () {

    $('.pie-canvas').each(function (index, elem) {
      var total = $(elem).data('total');
      var amount = $(elem).data('amount');

      data.datasets[0].data = [amount, total - amount];

      console.log(data);

      new Chart(elem, {
        type: 'doughnut',
        data: data
      });
    });
  });
}(jQuery));



