<?php 
include('connection.php');


if($_POST){
  $data= $_POST;
  print_r($data);die;
  
   if($_SESSION['seesion_data']['usertype'] == 1){ //admin 
    $sql = 'UPDATE student_table SET name="'.$_POST["name"].'", email="'.$_POST["email"].'", password="'.$_POST["password"].'"
    WHERE "'.$_SESSION['seesion_data']['id'].'"';
    //print_r($_SESSION['seesion_data']['id']); die;

if($conn->query($sql) === TRUE){
    // echo "New record created successfully";
    header('Location:listStudent.php');
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
     }else{ //student
         echo 'You are not alowed to do this operation';
     }
    
}else{

}

?>