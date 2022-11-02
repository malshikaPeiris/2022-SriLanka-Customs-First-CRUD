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
    <a href="user.php" class="text-light"><button class="btn btn-dark my-5">Add User
      </button></a>&nbsp;&nbsp;
    <a href="excelupload.php" class="text-light"><button class="btn btn-info my-5">Upload a ExcelSheet 01
      </button></a>

     

    <table class="table">
      <thead>
        <tr>
          <th scope="col"></th>
          <th scope="col">Name</th>
          <th scope="col">drate</th>
          <th scope="col">email</th>
          <th scope="col">Password</th>
          <th scope="col">Operations</th>
        </tr>
      </thead>
      <tbody>

        <?php
        $sql = "Select * from `you_tube`";
        $result = mysqli_query($con, $sql);
        if ($result) {
          while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $name = $row['name'];
            $email = $row['email'];
            $drate = $row['drate'];
            $password = $row['password'];
            echo '<tr>
        <th scope="row">' . $id . '</th>
        <td>' . $name . '</td>
        <td>' . $email . '</td>
        <td>' . $drate . '</td>
        <td>' . $password . '</td>
        <td>
    <button class="btn btn-success"><a href="update.php? updateid=' . $id . ' " class="text-light">Update</a> </button>
    <button class="btn btn-danger"><a href="delete.php? deleteid=' . $id . ' " class="text-light">Delete</a> </button>
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