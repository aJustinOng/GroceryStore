<?php
require_once ('./mysqli_connect.php');
// Check connection
if (!$dbc) {
    die("Connection failed: " . mysqli_connect_error());
}
$MinAmt=$_POST["MinAmt"];
$MaxAmt=$_POST["MaxAmt"];
// sql to delete a record
$sql = "select product_id, product_name, product_stock
        from products
        where product_stock >= $MinAmt && product_stock <= $MaxAmt
";

$result = mysqli_query($dbc,$sql);

echo "<table border='1'>
<tr>
<th>Product ID</th>
<th>Product</th>
<th>Amount in Stock</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
    echo "<tr>";
    echo "<td>" . $row['product_id'] . "</td>";
    echo "<td>" . $row['product_name'] . "</td>";
    echo "<td>" . $row['product_stock'] . "</td>";
    echo "</tr>";
}
echo "</table>";

if ($MinAmt > $MaxAmt) {
    echo "Error: Minimum amount cannot exceed maximum amount";
}

mysqli_close($dbc);
?>