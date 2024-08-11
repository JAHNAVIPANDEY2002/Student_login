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
$sql = 'SELECT  id, name, designation, state_lgd_code, district_lgd_code, gender, address, email FROM table_users WHERE id="'.$_SESSION['session_data']['id'].'" ';
// $sql="SELECT state_name FROM master_state WHERE lgdcode= '".$data['state_lgd_code']."'";
// $mysqli -> multi_query($sql);
$result = $conn->query($sql);
$data = $result->fetch_assoc();
//print_r($_SESSION['session_data']['id']); die;
// include('include.html');

?>
<div class="container">
    <h1 class="text-primary">List of users</h1>
<div class="row" style="margin-top: 10px">
<table class="table table-bordered">
  <thead>
  <tr>
    <th>Name</th>
    <th>Designation</th>
    <th>State</th>
    <th>District</th>
    <th>Gender</th>
    <th>Address</th>
    <th>Email</th>
    <th>Action</th>
  </tr>
  </thead>
  
<?php 
    foreach($result as $row) { //echo '<pre>'; print_r($row); die;
      // for state name
      $sq="SELECT state_name FROM master_state WHERE lgdcode= '".$row['state_lgd_code']."'";
      $result = $conn->query($sq);
      $data = $result->fetch_assoc();
      // for district name
      $sq="SELECT district_name FROM master_district WHERE district_lgd_code= '".$row['district_lgd_code']."'";
      $result = $conn->query($sq);
      $da = $result->fetch_assoc();
     // echo '<pre>'; print_r($data['state_name']); die;
    echo " <tr>
    

      </tr> " ."<br>";
      echo " <tr> 
      <td> " . $row["name"] . " </td> 
      <td> "  . $row["designation"] . " </td> 
      <td> " . $data['state_name'] . " </td>
      <td> " . $da['district_name'] ." </td> 
      <td>" . $row["gender"] . " </td>
      <td>" . $row["address"] . " </td>
      <td>" . $row["email"] . " </td>
      <td>
      <a href='editUser.php?id=$row[id]' class='btn btn-primary'>Edit</a>
      </td>
      </tr> " ."<br>";
    }
  
// }
?>
</div>
</table>
<div class="row" style="margin-top: 20px;">
            <a href='logoutUser.php' class='col-md-6 btn btn-primary'>Logout</a>
        </div>
</body>
</html>