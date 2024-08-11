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
    <title>Edit student</title>
</head>
<body>
<?php
include('connection.php');
//print_r($_GET); die; 
$sql = "SELECT  id, name, designation, state_lgd_code, district_lgd_code, gender, address FROM table_users WHERE id=".$_SESSION['session_data']['id'];
//print_r($_SESSION["session_data"]["id"]);die;
$result = $conn->query($sql);
 $data = $result->fetch_assoc();
 //print_r($data);die;
 //print_r($data['name']);die;
?>
<div class="container">
        <h1 class="text-primary">Edit</h1>
        <!-- <a href="std_register.html">Register as student</a> -->
        <form class="was-validated" method="post" action="editaddUser.php">
            <div class="form-group">
            <label for="name" >Name</label>
            <input type="text" name="name" class="form-control" placeholder="<?php print_r($data['name'])?>" >
            <div class="valid-feedback">Valid</div>
            <div class="invalid-feedback">PLease fill the required information</div>
        </div>
         <div class="form-group">
            <label for="designation" >Designation</label>
            <input type="text" name="designation" class="form-control" placeholder="<?php print_r($data['designation'])?>">
            <div class="valid-feedback">Valid</div>
            <div class="invalid-feedback">PLease fill the required information</div>
        </div>
        <div class="form-group">
        <label for="state">State</label>
        <select class="form-control" id="state-dropdown" name="state">
        <option value="">Select State</option>
        <?php
        require_once "connection.php";
        $sql = "SELECT * FROM master_state";
        $result = $conn->query($sql);
       // print_r($row); die;
        while($row = mysqli_fetch_array($result)) {
        ?>
        <option value="<?php echo $row["lgdcode"];?>" <?php if ($data['state_lgd_code']==$row["lgdcode"]) echo "selected";?>><?php echo $row["state_name"];?></option>
        <?php
        }
        // print_r($row['']); die;
        ?>
        
        </select>
        </div>
        <div class="form-group">
        <label for="district">District</label>
        <select class="form-control" id="district-dropdown" name="district">
        </select>
        </div>
        <!-- <div class="form-group">
            <label for="content">Select State </label>
            <select class="form-control" name="state">
                <option value="">-- Select State --</option>
                <option value="1">Uttar Pradesh</option>
                <option value="2">Haryana</option>
                <option value="3">Rajasthan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="content">Select District </label>
            <select class="form-control" name="district">
                <option value="">-- Select District --</option>
                <option value="1">Etah</option>
                <option value="2">Faridabad</option>
                <option value="3">Ajmer</option>
            </select>
        </div> -->
        <div class="form-check">
            <label class="form-check-label">Gender</label><br>
             <div><input type="radio" class="form-check-input" name="gender" <?php if (isset($data) && $data['gender']=="Female" ) echo "checked";?> value="Female" >Female</div>
              <div><input type="radio" class="form-check-input" name="gender" <?php if (isset($data) && $data['gender']=="Male" ) echo "checked";?> value="Male" >Male</div>
              <div><input type="radio" class="form-check-input" name="gender" value="<?php print_r($data['gender'])?>" >other</div>
          </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea class="form-control" name="address" placeholder="<?php print_r($data['address'])?>"></textarea>
            </div>
            <!-- <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" placeholder="enter email">
                <div class="valid-feedback">Valid</div>
                <div class="invalid-feedback">PLease fill the required information</div>
            </div> -->
            <!-- <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="<?php print_r($data['password'])?>">
                <div class="valid-feedback">Valid</div>
                <div class="invalid-feedback">PLease fill the required information</div>
            </div> -->
        <input type="submit" class="btn btn-primary" value="Submit">
        </form>
        <!-- <h5>If you are registered user. Click on <a href="loginUser.html"> Login </a></h5> -->
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <?php if(isset($data['state_lgd_code'])) { ?>
    <script>   
    $(document).ready(function() {
    var  district_id= '<?php echo $data["district_lgd_code"] ?>';
    var  state_id= '<?php echo $data["state_lgd_code"] ?>';

   // alert(state_id);
    $.ajax({
    url: "edit-district-by-state.php",
    type: "POST",
    data: {
        district_id: district_id,
        state_id: state_id
    },
    cache: false,
    success: function(result){
    $("#district-dropdown").html(result);
    // $('#district-dropdown').html('<option value="">Select State First</option>'); 
    }
    });
})
    </script>
        <?php }?>

 <script>
    $(document).ready(function() {
    $('#state-dropdown').on('change', function() {
    var state_id = this.value;
    
    $.ajax({
    url: "edit-district-by-state.php",
    type: "POST",
    data: {
    state_id: state_id
    },
    cache: false,
    success: function(result){
    $("#district-dropdown").html(result);
    // $('#district-dropdown').html('<option value="">Select State First</option>'); 
    }
    });
    });    
    });
</script>
</body>
</html>