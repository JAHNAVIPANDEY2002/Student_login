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
if($_SESSION['seesion_data']['usertype'] == 1){//admin
    $sql = 'SELECT  id, name, email, user_id  FROM student_table WHERE usertype!="1"';
    $result = $conn->query($sql);
    include('include.html');?>
    <div class="container">
    <h1 class="text-primary">List of Students</h1>
    <table class="table table-bordered">
      <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>User Id</th>
        <th>Action</th>
      </tr>
      </thead>
    <?php if ($result->num_rows > 0) {
        foreach($result as $row) {
          echo " <tr> 
          <td> " . $row["name"] . " </td> 
          <td> "  . $row["email"] . " </td> 
          <td> " . $row["user_id"] . " </td>  
          <td>
          <a href='deleteStudent.php?id=$row[id]' class='btn btn-danger'>Delete</a>
          </td>
          
          </tr> " ."<br>";
        }
    }else{

    }
}

else{

    echo 'Sorry Unauthorised access';
  }
// }
?>
</div>
</table>
</body>
</html>


























