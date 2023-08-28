<?php
require_once ('./mysqli_connect.php');
// Check connection
if (!$dbc) {
    die("Connection failed: " . mysqli_connect_error());
}
$EmID=$_POST["EmID"];
// sql to delete a record
$sql = "DELETE FROM employees WHERE employee_id=$EmID";

if (mysqli_query($dbc, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($dbc);
?>

