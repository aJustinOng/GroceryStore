<?php
require_once ('./mysqli_connect.php');

//the inputs
$id=$_POST["id"];
$date=$_POST["date"];
$eid=$_POST["eid"];

//Make sure the customer ID exists
$sql="SELECT * FROM customers";
$result = mysqli_query($dbc,$sql);
$test_c = FALSE;
while($row = mysqli_fetch_array($result))
{
    if($row['customer_id']==$id){
        $test_c = TRUE;
    }
}
if($test_c == FALSE){
    exit("Customer Does not Exist!");
}

//Make sure the employee ID exists
$sql="SELECT * FROM employees";
$result = mysqli_query($dbc,$sql);
$test_e = FALSE;
while($row = mysqli_fetch_array($result))
{
    if($row['employee_id']==$eid){
        $test_e = TRUE;
    }
}
if($test_e == FALSE){
    exit("Employee Does not Exist!");
}

$sql="SELECT product_id,product_name,product_price,product_stock FROM products";
$result = mysqli_query($dbc,$sql);

echo "<form action=\"conclusion.php\" method=\"post\">";

//send the input to next file
echo "<input type=\"hidden\" name=\"id\" value=$id>";
echo "<input type=\"hidden\" name=\"date\" value=$date>";
echo "<input type=\"hidden\" name=\"eid\" value=$eid>";

//make the table for purchasing
echo "<table border='1'>
<tr>
<th>ID</th>
<th>Product Name</th>
<th>Price</th>
<th>Quantity Available</th>
<th>Quantity You Want</th>
</tr>";
while($row = mysqli_fetch_array($result))
{
    $stock = $row['product_stock'];
    echo "<tr>";
    echo "<td>" . $row['product_id'] . "</td>";
    echo "<td>" . $row['product_name'] . "</td>";
    echo "<td>" . $row['product_price'] . "</td>";
    echo "<td>" . $row['product_stock'] . "</td>";
    echo "<td><input type='number' name='quantities[]' min='0' max='$stock'></td>";
    echo "</tr>";
}
echo "</table>";
echo "<input type=\"submit\" value=\"Submit\">";

echo "</form>";

mysqli_close($dbc);
?>