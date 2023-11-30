$(document).ready(function () {
  // Sales and purchases last 7 days chart
  let salesPurchasesBar = document.getElementById('salesPurchasesChart');
  $.get('/sales-purchases/chart-data', function (response) {
    let salesPurchasesChart = new Chart(salesPurchasesBar, {
      type: 'bar',
      data: {
        labels: response.sales.original.days,
        datasets: [{
          label: 'Sales',
          data: response.sales.original.data,
          backgroundColor: [
            '#2B3499',
          ],
          borderColor: [
            '#2B3499',
          ],
          borderWidth: 1
        },
        {
          label: 'Purchases',
          data: response.purchases.original.data,
          backgroundColor: [
            '#FF6C22',
          ],
          borderColor: [
            '#FF6C22',
          ],
          borderWidth: 1
        }
        ]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  });

  // Current Month chart
  let overviewChart = document.getElementById('currentMonthChart');
  $.get('/current-month/chart-data', function (response) {
    let currentMonthChart = new Chart(overviewChart, {
      type: 'doughnut',
      data: {
        labels: ['Sales', 'Purchases'],
        datasets: [{
          data: [response.sales, response.purchases],
          backgroundColor: [
            '#2B3499',
            '#F99417',
          ],
          hoverBackgroundColor: [
            '#2B3499',
            '#F99417',
          ],
        }]
      },
    })
  })
})