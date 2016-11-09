(function ($) {
  $(function () {
    var data = {
      labels: [
        "Red",
        "Blue",
      ],
      datasets: [
        {
          data: [300, 50],
          backgroundColor: [
            "#FF6384",
            "#36A2EB",
          ],
          hoverBackgroundColor: [
            "#FF6384",
            "#36A2EB",
          ]
        }],
      options: {
        responsive: true
      }
    };

    var ctx = $('.pie-canvas')[0];
    var myPieChart = new Chart(ctx, {
      type: 'doughnut',
      data: data
    });
  });
}(jQuery));



