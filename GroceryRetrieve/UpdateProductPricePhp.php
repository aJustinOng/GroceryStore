<?php
require_once ('./mysqli_connect.php');
// Check connection
if (!$dbc) {
    die("Connection failed: " . mysqli_connect_error());
}
$ID=$_POST["ID"];
$NewPrice=$_POST["NewPrice"];

$sql = "update products
    set product_price = $NewPrice
    where product_id = $ID;
";

if (mysqli_query($dbc, $sql)) {
    echo "Price has been updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($dbc);
?>