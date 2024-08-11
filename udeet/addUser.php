<?php 
include('connection.php');

if($_POST){
    $sq="SELECT * FROM table_users where email='".$_POST['email']."'";
    $result= $conn->query($sq);
  //  print_r($result);
 $row = $result->fetch_assoc();
//  print_r($row); die;   
 if(!empty($row)){
    echo 'This id is already exist'; die;
 }else{
        $sql = 'INSERT INTO table_users (name, designation, state_lgd_code, district_lgd_code , gender, address, email, password) VALUES 
        ("'.$_POST["name"].'","'.$_POST["designation"].'",
        "'.$_POST["state"].'","'.$_POST["district"].'",
        "'.$_POST["gender"].'","'.$_POST["address"].'",
        "'.$_POST["email"].'","'.$_POST["password"].'")';
        // if(isset($_POST["submit"])) {
        //   $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        //   if($check !== false) {
        //     echo "File is an image - " . $check["mime"] . ".";
        //     $uploadOk = 1;
        //   } else {
        //     echo "File is not an image.";
        //     $uploadOk = 0;
        //   }
        // }
       // print_r($sql); die;
      // print_r($_FILES['profile']); die;
        
        
         //echo $sql; die;
          if($conn->query($sql) === TRUE) {
            //echo "New record created successfully";
             header('Location:loginUser.html');
             
            } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
}
}else{
  echo 'error';
}
?>