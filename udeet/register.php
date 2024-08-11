<?php 
include('connection.php');

if($_POST){
    //  print_r($_POST); die;

    $sq="SELECT * FROM student_table where email='".$_POST['email']."'";
    $result= $conn->query($sq);
  //  print_r($result);
 $row = $result->fetch_assoc();
//  print_r($row); die;   
 if(!empty($row)){
    echo 'This id is already exist'; die;
 }
		//}
     else{
      if(empty($_POST['name'])){
        echo"PLease enter the name";
      }elseif(empty($_POST['email'])){
        echo"PLease enter the email";
      }elseif(empty($_POST['user_id'])){
        echo"PLease enter the userid";
      }elseif(empty($_POST['password'])){
        echo"PLease enter the password";
      }else{
        $sql = 'INSERT INTO student_table ( usertype, name, email, user_id, password) VALUES 
("2","'.$_POST["name"].'","'.$_POST["email"].'","'.$_POST["user_id"].'","'.$_POST["password"].'")';

// echo $sql; die;
  if ($conn->query($sql) === TRUE) {


     
     echo "New record created successfully";
     //header('Location:student.html');
     
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
      }



}

 }
else{
  echo 'error';
}




?>