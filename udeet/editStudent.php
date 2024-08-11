<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script> -->
    <title>Edit student</title>
</head>
<body>
<?php
include('connection.php');
//print_r($_GET);die;
if($_SESSION['seesion_data']['usertype'] == 1){ //admin 
    $sql = "SELECT  id, usertype, name, email, user_id, password  FROM student_table WHERE id=".$_GET['id'];
    $result = $conn->query($sql);
    $data = $result->fetch_assoc();
  }else{
    echo 'You are not alowed to do this operation';
    }
?>
<div class="container">
        <h1 class="text-primary">Edit</h1>
        <!-- <a href="std_register.html">Register as student</a> -->
        <form class="was-validated" method="post" action="editaddStudent.php">
            <div class="form-group">
            <label for="name" >Name</label>
            <input type="text" name="name" class="form-control" placeholder="<?php print_r($data['name'])?>" >
            <div class="valid-feedback">Valid</div>
            <div class="invalid-feedback">PLease fill the required information</div>
        </div>
        <div class="form-group">
            <label for="name" >Email</label>
            <input type="email" name="email" class="form-control" placeholder="<?php print_r($data['email'])?>" >
            <div class="valid-feedback">Valid</div>
            <div class="invalid-feedback">PLease fill the required information</div>
        </div>
        <div class="form-group">
            <label for="name" >Password</label>
            <input type="password" name="password" class="form-control" placeholder="<?php print_r($data['password'])?>" >
            <div class="valid-feedback">Valid</div>
            <div class="invalid-feedback">PLease fill the required information</div>
        </div>
        <input type="submit" class="btn btn-primary" value="Edit">
    </form>
  </div>
  
    
</body>
</html>