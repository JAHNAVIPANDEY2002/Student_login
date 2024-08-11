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
    $sql = 'SELECT  id, name, year, email  FROM studentlist' ;
    $result = $conn->query($sql);?>
    <div class="container">
    <h1 class="text-primary">List of Students</h1>
    <table class="table table-bordered">
      <thead>
      <tr>
        <th>Name</th>
        <th>Year</th>
        <th>Email</th>
      </tr>
      </thead>
    <?php if ($result->num_rows > 0) {
        foreach($result as $row) {
          echo " <tr> 
          <td> " . $row["name"] . " </td> 
          <td> "  . $row["year"] . " </td> 
          <td> " . $row["email"] . " </td>
          </tr> " ."<br>";
        }
    }else{

    }
?>
</div>
</table>
</body>
</html>