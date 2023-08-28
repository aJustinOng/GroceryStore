<?php
require_once ('./mysqli_connect.php');

$sql="SELECT product_id,product_name,product_price,product_stock,supplier_name FROM products natural join suppliers";

$result = mysqli_query($dbc,$sql);

echo "<table border='1'>
<tr>
<th>ID</th>
<th>Name</th>
<th>Price</th>
<th>Quantity Available</th>
<th>Supplier</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
	echo "<tr>";
	echo "<td>" . $row['product_id'] . "</td>";
	echo "<td>" . $row['product_name'] . "</td>";
	echo "<td>$" . $row['product_price'] . "</td>";
	echo "<td>" . $row['product_stock'] . "</td>";
	echo "<td>" . $row['supplier_name'] . "</td>";
	echo "</tr>";
}
echo "</table>";

mysqli_close($dbc);
?>