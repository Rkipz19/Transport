fetch('contents/orderschart.php')
.then(response => response.json())
.then(data => {
  const labels = data.map(row=>row.distance_km);
  const cost = data.map(row=>row.total_cost);
})
const ctx = document.getElementById('myChart');

new Chart(ctx, {
  type: 'bar',
  data: {
    labels: labels,
    datasets: [{
      label: 'Number of employees, Vehicles and Farmers',
      data: cost,
      borderWidth: 1
    }]
  },
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
});