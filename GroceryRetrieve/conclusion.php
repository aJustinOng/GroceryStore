<?php
require_once ('./mysqli_connect.php');

if (!$dbc) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql="SELECT product_id,product_name,product_price,product_stock FROM products";
$result = mysqli_query($dbc,$sql);

//inputs from last page
$id=$_POST["id"];
$date=$_POST["date"];
$eid=$_POST["eid"];
$quantities = $_POST["quantities"];

//check if all inputs empty or 0.
//if so, no update to the database
$allZero = true;
foreach ($quantities as $element) {
    if ($element != 0 and $element!=='') {
        $allZero = false;
        break;
    }
}
if ($allZero) {
    exit("No Purchase, Welcome");
}

//subtract the each product_stock by the amount of each product the customer had bought
$i = 0;
while($row = mysqli_fetch_assoc($result)) {
    $quantity = $quantities[$i];
    if ($quantity === '') {
        $quantity = 0;
    }
    $pid = $row['product_id'];
    $sql1 = "UPDATE products SET product_stock = product_stock - $quantity WHERE product_id = $pid";
    mysqli_query($dbc, $sql1);
    $i++;
}

//insert a new transaction
$sql2 = "INSERT INTO `transactions`(`transaction_date`, `customer_id`, `employee_id`) VALUES ('$date',$id,$eid)";
mysqli_query($dbc,$sql2);


//insert a new row into the transactions_products table
$sql="SELECT * FROM products";
$result = mysqli_query($dbc,$sql);
$i = 0;
while($row = mysqli_fetch_assoc($result)) {
    $quantity = $quantities[$i];
    $pid = $row['product_id'];
    if($quantity!==''&&$quantity!=0){
        $sql1 = "INSERT INTO `transactions_products`(`transaction_id`, `product_id`, `number_of_product`) VALUES (LAST_INSERT_ID(),$pid,$quantity)";
        mysqli_query($dbc, $sql1);
    }
    $i++;
}

//show the Transaction
$sql2="SELECT product_id,product_name,product_price,number_of_product,ROUND((product_price*number_of_product),2) as total FROM transactions_products natural join products where transaction_id=LAST_INSERT_ID()";
$result1 = mysqli_query($dbc,$sql2);
echo "The Products You Had Bought";
echo "<table border='1'>
<tr>
<th>Product ID</th>
<th>Product Name</th>
<th>Price per product</th>
<th>Quantity Bought</th>
<th>Total Price</th>
</tr>";

while($row1 = mysqli_fetch_array($result1))
{
    echo "<tr>";
    echo "<td>" . $row1['product_id'] . "</td>";
    echo "<td>" . $row1['product_name'] . "</td>";
    echo "<td>$" . $row1['product_price'] . "</td>";
    echo "<td>" . $row1['number_of_product'] . "</td>";
    echo "<td>$" . $row1['total'] . "</td>";
    echo "</tr>";
}
$sql2="SELECT ROUND(sum(product_price*number_of_product),2) as total FROM transactions_products natural join products where transaction_id=LAST_INSERT_ID()";
$result1 = mysqli_query($dbc,$sql2);
$row1 = mysqli_fetch_array($result1);
echo "<tr>
<th></th>
<th></th>
<th></th>
<th>Total Spent</th>
<th>$".$row1['total']."</th>
</tr>";
echo "</table>";

//end
echo "Welcome!";
mysqli_close($dbc);
?>