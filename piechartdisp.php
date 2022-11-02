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

    foreach ($query as $data) {
        $role[] = $data['role'];
        $amount[] = $data['amount'];
    }

    ?>
    <center>
        <div class="container my-5" style="width:500px;">
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
                data:  <?php echo json_encode($amount)?>,
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)'
                ],
                hoverOffset: 4
            }]
        };

        const config = {
            type: 'pie',
            data: data,
        };

        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
</body>

</html>