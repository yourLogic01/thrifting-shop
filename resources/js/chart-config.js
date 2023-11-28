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
            '#6366F1',
          ],
          borderColor: [
            '#6366F1',
          ],
          borderWidth: 1
        },
        {
          label: 'Purchases',
          data: response.purchases.original.data,
          backgroundColor: [
            '#A5B4FC',
          ],
          borderColor: [
            '#A5B4FC',
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
        labels: ['Sales', 'Purchases', 'Expenses'],
        datasets: [{
          data: [response.sales, response.purchases, response.expenses],
          backgroundColor: [
            '#F59E0B',
            '#0284C7',
            '#EF4444',
          ],
          hoverBackgroundColor: [
            '#F59E0B',
            '#0284C7',
            '#EF4444',
          ],
        }]
      },
    })
  })
})