<?php 
include('connection.php');
//echo '<pre>'; print_r($_POST); die;
//print_r($_POST); die;
if($_SESSION['seesion_data']['usertype'] == 1){ //admin
if(isset($_POST)){
  
  
    $my="INSERT INTO user_table (state, district, address) VALUES ( '".$_POST["state"]."','".$_POST["district"]."','".$_POST["address"]."')" ;
   
    if($conn->query($my) === TRUE){
       $last_id = $conn->insert_id;
       // echo "New record created successfully. Last inserted ID is: " . $last_id;
    }
  
    
      // $data = $_POST;
     // echo '<pre>';print_r($_POST['name'][0]);die;
      $count=count($_POST['name']);
      // echo '<pre>';print_r($count);die;
      for($i = 0; $i < $count; $i++){ //die('gvgh');
         $name=$_POST['name'][$i];
         $email=$_POST['email'][$i];
         $password=$_POST['password'][$i];
         $userid=$last_id;
         $usertyp1=2;
         $sql='INSERT INTO student_table (usertype, name, email, user_id, password) VALUES 
        ("'.$usertyp1.'", "'.$name.'" , "'.$email.'", "'.$userid.'" , "'.$password.'")';
        mysqli_query($conn, $sql);
       //echo $conn->query($sql);
      }
        
      header('Location:listStudent.php');
        
        //  //echo $sql; die;
          // if($conn->query($sql) === TRUE) {
          //    //echo "New record created successfully";
          //    header('Location:listStudent.php');
             
          //   } else {
          //    echo "Error: " . $sql . "<br>" . $conn->error;
          //  }
    }
      
      }else{
        echo ' Sorry. you are not allowed to do this operation';
      }

   
?>