<?php 
include('connection.php');


if($_POST){
  if($_SESSION['session_data']['id']){
    $sql = 'UPDATE table_users SET name="'.$_POST["name"].'", designation="'.$_POST["designation"].'",
     state_lgd_code="'.$_POST["state"].'", district_lgd_code="'.$_POST["district"].'",
     gender="'.$_POST["gender"].'", address="'.$_POST["address"].'"
     WHERE id="'.$_SESSION['session_data']['id'].'"';
    // print_r($sql);die;
   //print_r($_SESSION['session_data']['id']); die;
   if(isset($sql)){
    if($conn->query($sql) === TRUE){
        // echo "New record created successfully";
        header('Location:listUser.php');
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
        
   }else{
    echo'update not done';
   }
  }else{
    echo'session doesnot set';
  }
}else{

}

?>