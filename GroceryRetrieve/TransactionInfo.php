<?php
require_once ('./mysqli_connect.php');
$id=$_POST["id"];

$sql="SELECT transaction_id,transaction_date,employee_id,ROUND(SUM(number_of_product * product_price),2) AS total_price FROM transactions natural join transactions_products natural join products where customer_id=$id group by transaction_id";

$result = mysqli_query($dbc,$sql);

echo "<table border='1'>
<tr>
<th>Transaction ID</th>
<th>Date</th>
<th>Employee ID</th>
<th>Total spent</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
	echo "<tr>";
	echo "<td>" . $row['transaction_id'] . "</td>";
	echo "<td>" . $row['transaction_date'] . "</td>";
	echo "<td>" . $row['employee_id'] . "</td>";
	echo "<td>$" . $row['total_price'] . "</td>";
	echo "</tr>";
}
echo "</table>";



$sql="SELECT distinct transaction_id FROM transactions natural join transactions_products natural join products where customer_id=$id";
$result = mysqli_query($dbc,$sql);
while($row = mysqli_fetch_array($result))
{
$tid = $row['transaction_id'];

$sql2="SELECT product_id,product_name,product_price,number_of_product FROM transactions_products natural join products where transaction_id=$tid";
$result1 = mysqli_query($dbc,$sql2);
echo "Products You Had Bought In Transaction $tid";
echo "<table border='1'>
<tr>
<th>Product ID</th>
<th>Product Name</th>
<th>Price per product</th>
<th>Quantity Bought</th>
</tr>";

while($row1 = mysqli_fetch_array($result1))
{
    echo "<tr>";
    echo "<td>" . $row1['product_id'] . "</td>";
    echo "<td>" . $row1['product_name'] . "</td>";
    echo "<td>$" . $row1['product_price'] . "</td>";
    echo "<td>" . $row1['number_of_product'] . "</td>";
    echo "</tr>";
}
echo "</table>";
}
mysqli_close($dbc);
?>