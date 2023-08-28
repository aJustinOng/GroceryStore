<?php
require_once ('./mysqli_connect.php');
// Check connection
if (!$dbc) {
    die("Connection failed: " . mysqli_connect_error());
}
// sql to delete a record
$sql = "select employee_name, employee_position
        from employees
        where employee_position = 'Clerk';
";

$result = mysqli_query($dbc,$sql);

echo "<table border='1'>
<tr>
<th>Employee Name</th>
<th>Employee Position </th>
</tr>";

while($row = mysqli_fetch_array($result))
{
    echo "<tr>";
    echo "<td>" . $row['employee_name'] . "</td>";
    echo "<td>" . $row['employee_position'] . "</td>";
    echo "</tr>";
}
echo "</table>";

mysqli_close($dbc);
?>
