<?php
$user_city = [];
$user_count = [];
?>
<h2>Jumlah Pengguna</h2>
<div class="cards">
    <?php
        foreach ($statistic as $s) {
            $user_city[] = $s['user_city'];
            $user_count[] = $s['user_count'];
    ?>
    <div class="card">
        <h2><?= $s['user_city']; ?></h2>
    </div>
    <?php
        }
    ?>
</div>
<a href="<?= urlpath('report'); ?>" class="btn btn-success">Print</a>

<div>
  <canvas id="myChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart');
  const labels = <?= json_encode($user_city); ?>;
  const data = <?= json_encode($user_count); ?>;
  new Chart(ctx, {
    type: 'pie',
    data: {
      labels: labels,
      datasets: [{
        label: '# of Votes',
        data: data,
        borderWidth: 1
      }]
    },
  });
</script>