<?php 
include('connection.php');


if($_POST){
  //print_r($_SESSION['seesion_data']['usertype']); die;
  
  if($_SESSION['seesion_data']['usertype'] == 1){ //admin 
    echo 'You are not alowed to do this operation';
  }
    else{ //student
        $sql = 'UPDATE course SET course="'.$_POST["course"].'" WHERE "'.$_SESSION['seesion_data']['id'].'"';

if($conn->query($sql) === TRUE){
    // echo "New record created successfully";
    header('Location:listCourse.php');
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
    }

//  echo $sql; die;



}else{

}

?>