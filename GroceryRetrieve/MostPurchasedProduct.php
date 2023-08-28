<?php
require_once ('./mysqli_connect.php');

$sql="select product_name, products.product_id, sum(number_of_product) as total_sales
    from products, transactions_products
    where products.product_id = transactions_products.product_id
    group by product_id
    order by total_sales desc
    limit 1;
";

$result = mysqli_query($dbc,$sql);

echo "<table border='1'>
<tr>
<th>Product ID</th>
<th>Product</th>
<th>Total Sales</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
    echo "<tr>";
    echo "<td>" . $row['product_id'] . "</td>";
    echo "<td>" . $row['product_name'] . "</td>";
    echo "<td>" . $row['total_sales'] . "</td>";
    echo "</tr>";
}
echo "</table>";

mysqli_close($dbc);
?>