<?php
include('connection.php');

if($_POST){
  if(empty($_POST['email'])){
    echo"Please enter the valid email";
  }elseif(empty($_POST['password'])){
    echo"Please enter the valid password";
  }else{
    $sql = 'SELECT * FROM student_table where  email="'.$_POST['email'].'" and password="'.$_POST['password'].'"';

$result = $conn->query($sql);
// print_r($result);
 $row = $result->fetch_assoc();
// echo '<pre>'; print_r($row); die;
 if ($row) {
//    $_SESSION["email"] = $_POST['email'];
  if($row['usertype'] == 1){ // admin redirect
    //type id.
    $_SESSION['seesion_data'] = $row;
    
    header('Location:admindashboard.html');
  }else{ // student redirect
    $_SESSION['seesion_data'] = $row;

    header('Location:studentdashboard.html');
  }
    //  echo 'Login Successful';
  //  echo "New record created successfully";
        // 
  } else {
     echo 'Login Failed. Invalid Username or password'; 
     
   }
 
  }

  }
  ?>