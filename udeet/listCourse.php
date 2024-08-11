<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 <style>
table, th, td {
    border: 1px solid black;
    text-align: center;
}
td,th{
  color: blue;
}
</style>
</head>
<body>
<?php
include('connection.php');
if($_SESSION['seesion_data']['usertype'] == 1){ // admin
    $sql = 'SELECT  id, course  FROM course';
    $result = $conn->query($sql);
    include('include.html');?>
<div class="container">
  <h1 class="text-primary">List of courses</h1>
<div class="row" style="margin-top: 20px">
<table class="table table-bordered">
  <thead>
  <tr>
    <th>id</th>
    <th>course</th>
    <th>Action</th>
  </tr>
  </thead>
<?php if ($result->num_rows > 0) {
    foreach($result as $row) {
      echo " <tr> 
      <td> " . $row["id"] . " </td> 
      <td> "  . $row["course"] . " </td>   
      <td>
      <a href='deleteCourse.php?id=$row[id]' class='btn btn-danger'>Delete</a>
      </td>
      
      </tr> " ."<br>";
    }
  } else{

  }

}else{ // student
    $sql = 'SELECT  id, course  FROM course where login_id ='.$_SESSION['seesion_data']['id'];
    $result = $conn->query($sql);
    include('studentinclude.html');?>
<div class="container">
<h1 class="text-primary">List of courses</h1>
<div class="row" style="margin-top: 20px">
<table class="table table-bordered">
  <thead>
  <tr>
    <th>id</th>
    <th>course</th>
    <th>Action</th>
  </tr>
  </thead>
<?php if ($result->num_rows > 0) {
    foreach($result as $row) {
      echo " <tr> 
      <td> " . $row["id"] . " </td> 
      <td> "  . $row["course"] . " </td>   
      <td>
      <a href='editCourse.php?id=$row[id]' class='btn btn-primary'>Edit</a>
      </td>
      
      </tr> " ."<br>";
    }
  } else{

  }

}


// }
?>
</div>
</table>
</body>
</html>