<?php
$user_city = [];
$user_count = [];
foreach ($contacts as $c) {
    $user_city[] = $c['user_city'];
    $user_count[] = $c['user_count'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .result {
            display: flex;
            justify-content: center;
        }
        .chart {
            width: 35%;
            height: 1000px;
            margin: auto;
        }

        @media print {
            .result {
                display: flex;
                justify-content: center;
                text-align: center;
            }
            .chart {
                width: 70%;
                margin: auto;
            }
        }
    </style>
</head>
<body>
    <h1 align="center">KOP LAPORAN</h1>
    <hr>
    <h3>Ini laporannya</h3>
    <div class="result">
        <div class="chart">
            <canvas id="myChart"></canvas>
        </div>
    </div>
</body>
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
        options: {
            animations: false
        }
    });

    window.onload = function() {
        window.print();
    }
</script>
</html>