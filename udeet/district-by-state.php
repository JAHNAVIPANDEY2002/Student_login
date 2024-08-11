<?php
require_once "connection.php";
$state_id = $_POST["state_id"];
$sql = "SELECT * FROM master_district where state_lgd_code = $state_id";


$result = $conn->query($sql);
//echo '<pre>'; print_r($result);die;
?>
<option value="">Select District</option>
<?php
while($row = mysqli_fetch_array($result)) {
?>
 <option value="<?php echo $row["district_lgd_code"];?>" ><?php echo $row["district_name"];?></option>
<?php
}
?>