<?php
include 'connect.php';
if(isset($_POST['submit'])){
    $name= $_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $password=$_POST['password'];
    $password1=md5($password);
    
    $sql="insert into `crud`(name,email,mobile,password) 
    values('$name','$email','$mobile','$password1')";
    $result=mysqli_query($con,$sql);
    if($result){
        //echo "data inserted successfully";
        header('location:display.php');
    }else{
        die(mysqli_error($con));
    }
}


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" >

    <title>Crud Operation</title>
  </head>
  <body>
  <div class="container my-5">
    <form method="post">
      <div class="mb-3">
    <label>Name</label>
    <input type="text" class="form-control"
    placeholder="Enter Your Name" name ="name" autocomplete="off">
 </div>

 <div class="form-group">
    <form method="post">
      <div class="mb-3">
    <label>Email</label>
    <input type="text" class="form-control"
    placeholder="Enter Your email" name ="email" autocomplete="off">
 </div>

 <div class="form-group">
    <form method="post">
      <div class="mb-3">
    <label>Mobile</label>
    <input type="text" class="form-control"
    placeholder="Enter Your Mobile Number" name ="mobile" autocomplete="off">
 </div>

 <div class="form-group">
    <form method="post">
      <div class="mb-3">
    <label>Password</label>
    <input type="text" class="form-control"
    placeholder="Enter Your Password" name ="password" autocomplete="off">
 </div>
  
  <button type="submit" class="btn btn-dark" name="submit">Submit</button>
</form>
    </div>

    
  </body>
</html>