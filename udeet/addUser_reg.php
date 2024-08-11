
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register</title>
</head>
<body>
<?php require_once "connection.php" ;?>
<div class="container">
<h1 class="text-primary">Register</h1>
<form class="was-validated" method="post" action="addUser.php" enctype="multipart/form-data">
            <div class="form-group">
            <label for="name" >Name</label>
            <input type="text" name="name" class="form-control" placeholder="enter name">
            <div class="valid-feedback">Valid</div>
            <div class="invalid-feedback">PLease fill the required information</div>
        </div>
        <div class="form-group">
            <label for="designation" >Designation</label>
            <input type="text" name="designation" class="form-control" placeholder="enter your designation">
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
        <option value="<?php echo $row["lgdcode"];?>"><?php echo $row["state_name"];?></option>
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
        <div class="form-check">
            <label class="form-check-label">Gender</label><br>
             <div><input type="radio" class="form-check-input" name="gender" value="Female">Female</div>
              <div><input type="radio" class="form-check-input" name="gender" value="Male">Male</div>
              <div><input type="radio" class="form-check-input" name="gender" value="other">other</div>
        </div>
        <div class="form-group">
                <label for="address">Address</label>
                <textarea class="form-control" name="address"></textarea>
        </div>
        <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" placeholder="enter email">
                <div class="valid-feedback">Valid</div>
                <div class="invalid-feedback">PLease fill the required information</div>
        </div>
        <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="set password">
                <div class="valid-feedback">Valid</div>
                <div class="invalid-feedback">PLease fill the required information</div>
        </div>
        <input type="submit" class="btn btn-primary" value="Submit">                        
</form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    $(document).ready(function() {
    $('#state-dropdown').on('change', function() {
    var state_id = this.value;
    
    $.ajax({
    url: "district-by-state.php",
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