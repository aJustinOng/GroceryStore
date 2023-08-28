<?php
require_once ('./mysqli_connect.php');
// Check connection
if (!$dbc) {
    die("Connection failed: " . mysqli_connect_error());
}
$EmID=$_POST["EmID"];
$EmName=$_POST["EmName"];
$EmAd=$_POST["EmAd"];
$EmPh=$_POST["EmPh"];
$EmPo=$_POST["EmPo"];
$EmSa=$_POST["EmSa"];
$sql = "INSERT INTO `employees`(`employee_id`, `employee_name`, `employee_address`, `employee_phone`, `employee_position`, `employee_salary`) VALUES ($EmID,'$EmName','$EmAd','$EmPh','$EmPo',$EmSa)";

if (mysqli_query($dbc, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($dbc);
?>

