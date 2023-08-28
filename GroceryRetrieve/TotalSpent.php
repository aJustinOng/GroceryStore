<?php
require_once ('./mysqli_connect.php');

$sql=$sql="SELECT customer_name,ROUND(SUM(number_of_product * product_price),2) AS total_price FROM customers natural join transactions natural join transactions_products natural join products group by customer_id";

$result = mysqli_query($dbc,$sql);

echo "<table border='1'>
<tr>
<th>Name</th>
<th>Total Spent</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
	echo "<tr>";
	echo "<td>" . $row['customer_name'] . "</td>";
	echo "<td>" . $row['total_price'] . "</td>";
	echo "</tr>";
}
echo "</table>";

mysqli_close($dbc);
?>