<div>
  <canvas id="myChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart');
  new Chart(ctx, {
    type: 'pie',
    data: {
      labels: <?= $statistic['user_city']; ?>,
      datasets: [{
        label: '# of Votes',
        data: <? $statistic['user_count']; ?>,
        borderWidth: 1
      }]
    },
  });
</script>
