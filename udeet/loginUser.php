<?php
include('connection.php');

if($_POST){
$sql = 'SELECT * FROM table_users where  email="'.$_POST['email'].'" and password="'.$_POST['password'].'"';

$result = $conn->query($sql);
// print_r($result);
 $row = $result->fetch_assoc();
 // print_r($row); die;
 if ($row) {
    $_SESSION['session_data'] = $row;
   // print_r($_SESSION['seesion_data']['id']); die;
    
    header('Location:listUser.php');
    //  echo 'Login Successful';
  //  echo "New record created successfully";
  } else {
     echo 'Login Failed. Invalid Username or password'; 
     
   }
 
  }
  ?>