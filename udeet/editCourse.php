<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Bootstrap form</title>
</head>
<body>
<?php
include('connection.php');
if($_SESSION['seesion_data']['usertype'] == 1){ //admin 
    echo 'You are not alowed to do this operation';
  }else{
    $sql = "SELECT  id, course, login_id  FROM course WHERE login_id =".$_SESSION['seesion_data']['id'];

$result = $conn->query($sql);
// $data = $result->fetch_assoc();
  }
?>
<div class="container pt-3">
    <h1 class="text-primary"></h1>
    <form action="editaddCourse.php" method="post">
        <div class="form-group">
            <select class="form-control" name="course">
                <option value="">-- Select Course --</option>
                <option value="BCA">BCA</option>
                <option value="MCA">MCA</option>
                <option value="B.Tech">B.Tech</option>
                <option value="M.Tech">M.Tech</option>
            </select>
        </div>
        <input type="submit" class="btn btn-primary" value="submit">
    </form>
    </div>
    
</body>
</html>