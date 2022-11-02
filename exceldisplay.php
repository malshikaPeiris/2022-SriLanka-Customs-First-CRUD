<?php
include 'connect.php'; ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Operation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container">

    <a href="index.php" class="text-light"><button class="btn btn-dark my-5">View Bar Chart
      </button></a>&nbsp;
      <a href="linechart.php" class="text-light"><button class="btn btn-dark my-5">View Line Chart
      </button></a>&nbsp;
      <a href="piechartdisp.php" class="text-light"><button class="btn btn-dark my-5">View pie Chart
      </button></a>&nbsp;
        
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">empid</th>
                    <th scope="col">name</th>
                    <th scope="col">role</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $sql = "Select * from `sheet1`";
                $result = mysqli_query($con, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $empid = $row['empid'];
                        $name = $row['name'];
                        $role = $row['role'];
                        echo '<tr>
        <th scope="row">' . $empid . '</th>
        <td>' . $name . '</td>
        <td>' . $role . '</td>
        <td>
    
    </td>
      </tr>';
                    }
                }

                ?>

                <!-- 
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr> -->

            </tbody>
        </table>
    </div>

</body>

</html>