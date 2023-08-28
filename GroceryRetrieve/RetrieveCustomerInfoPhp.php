<?php
require_once ('./mysqli_connect.php');
$CustID=$_POST["CustID"];

$sql="SELECT customer_id,customer_name,
    customer_address,customer_phone
    FROM customers WHERE customer_id=$CustID";

$result = mysqli_query($dbc,$sql);

echo "<table border='1'>
<tr>
<th>Customer ID</th>
<th>Customer Name</th>
<th>Customer Address</th>
<th>Customer Phone</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
    echo "<tr>";
    echo "<td>" . $row['customer_id'] . "</td>";
    echo "<td>" . $row['customer_name'] . "</td>";
    echo "<td>" . $row['customer_address'] . "</td>";
    echo "<td>" . $row['customer_phone'] . "</td>";
    echo "</tr>";
}
echo "</table>";

mysqli_close($dbc);
?>