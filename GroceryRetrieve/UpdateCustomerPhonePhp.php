<?php
require_once ('./mysqli_connect.php');
// Check connection
if (!$dbc) {
    die("Connection failed: " . mysqli_connect_error());
}
$CustID=$_POST["CustID"];
$NewPhone=$_POST["NewPhone"];

$sql = "update customers
    set customer_phone = '$NewPhone'
    WHERE customer_id = $CustID";

if (mysqli_query($dbc, $sql)) {
    echo "Phone number has been updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($dbc);
?>