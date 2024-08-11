<?php
include('connection.php');

if(isset($_GET['id'])){
    if($_SESSION['seesion_data']['usertype'] == 1){ //admin 
        $sql = "DELETE FROM course WHERE id=".$_GET['id'];

    if ($conn->query($sql) === TRUE) {
    //   echo "Record deleted successfully";
        header('Location:listCourse.php');
    } else {
    }
      }else{
        echo 'You are not alowed to do this operation';
      }
   
}

?>