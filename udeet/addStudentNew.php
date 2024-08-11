<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script> -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script> -->
  <title>addStudent</title>
  <style>
    table,
    th,
    td {
      border: 4px solid black;
      text-align: center;
    }

    td,
    th {
      color: blue;
    }
    label{
      color: blue;
    }
  </style>
</head>

<body>
<div class="container">
    <h1 class="text-primary">Add Student</h1>
    <form name="form" class="was-validated" method="post" action="addStudent.php" id="myform" enctype="multipart/form-data">
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
    <div class="form-group">
      <label for="address">Address</label>
      <textarea class="form-control" name="address"></textarea>
    </div>
      <table id="table" name="table" class="table table-bordered">
        <!-- <tbody> -->
        <thead>
          <tr>
            <!-- <th>ID</th> -->
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Action</th>
          </tr>
        </thead>
        <tr>
        <td><input type="text" name="name[]" class="form-control" placeholder="enter name"></td>
        <td><input type="email" name="email[]" class="form-control " placeholder="enter email" id="email"></td>
        <td><input type="password" name="password[]" class="form-control " placeholder="set password"></td>
        <td><input type="button" name="add" class="btn-md btn btn-primary" value="Add" id="add"></td>

        </tr>

        <!-- </tbody> -->
      </table>
      <!-- <input type="button" name="add" class="btn-md btn btn-primary" value="Add" id="add"> -->
      <!-- <input type="button" name="add" class="btn-md btn btn-primary" value="Submit" id="save"> -->
      <input type="submit" class="btn btn-primary" value="Submit">
      <!-- <input type="submit" name="save" class="btn-md  btn btn-primary" value="Submit" id="save"> -->
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
  <script>
    $(document).ready(function () {
      $('#add').on('click', function () {
        var rowHtml = '<tr><td><input type="text" name="name[]" class="form-control" placeholder="enter name"></td>'
          + '<td><input type="email" name="email[]" class="form-control " placeholder="enter email" id="email"></td>'
          + '<td><input type="password" name="password[]" class="form-control " placeholder="set password"></td>'
          + '<td><input type="button" name="delete" class="btn btn-danger" value="delete" id="delete" onclick="deleteRow(this)" /></td></tr>';

        $.ajax({
          url: "addStudent.php",
          type: "GET",
          data: {
            rowHtml: rowHtml
          },
          cache: false,
          success: function (data) {
            $('#table').append(rowHtml);
          }
        });
      });
    });
    //     $('#save').on('click', function () {
    //  //alert('sss');
    //     // var myform = document.getElementById("myform");
    //     // var formdata = new FormData(myform );
    //     var data = new FormData($( 'form#myform' )[0] );

    //  //console.log(data);
    //  $.ajax({
    //           url: "addStudent.php",
    //           type: "POST",
    //           data: data,
    //           cache: false,
    //           success: function (data) {

    //           }
    //         });    

    //     });

    $('#delete').on('click', function () {
      deleteRow();
    })
    function deleteRow(dle) {
      var table = $('#table')[0];
      var rowCount = table.rows.length;
      if (rowCount <= 1) {
        alert("There is no row available to delete!");
        return;
      }
      else {
        $(dle).parent().parent().remove();
      }
    }
  
  </script>

</body>

</html>