<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Chart Display</title>
</head>

<body>

<?php
    include 'connect.php';

    $query = $con->query("
    select role as role, count(role) as amount
    from sheet1
    group by role
    ");

    foreach($query as $data){
        $role[]=$data['role'];
        $amount[]=$data['amount'];
    }

?>
    <center>
        <div  class="container my-5" style="width:1000px;">
            <canvas id="myChart"></canvas>
        </div>
        </center>

    <script>
        // === include 'setup' then 'config' above ===

        const labels = <?php echo json_encode($role)?>;
        const data = {
            labels: labels,
            datasets: [{
                label: 'My First Dataset',
                data:<?php echo json_encode($amount)?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)'
                ],
                borderWidth: 1
            }]
        };

        const config = {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    }
                }
            },
        };

        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
</body>

</html>