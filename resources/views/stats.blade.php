<x-mainpage>
  <h1>Grades</h1>
  
  <canvas id="jegyChart"></canvas>
</x-mainpage>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const labels = @json($labels);
  const values = @json($values);

  const context = document.getElementById('jegyChart');

  new Chart(context, {
    type: 'bar',

    data: {
      labels: labels,
      datasets: [{
        label: 'Count of grades',
        data: values,
        borderWidth: 1
      }]
    },

    options: {
      responsive: true
    }
  });
</script>