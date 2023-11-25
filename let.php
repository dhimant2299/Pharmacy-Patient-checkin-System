<?php
$conn=mysqli_connect("localhost","root","","patient");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($conn,"SELECT * FROM patient_info");

echo "<table border='1'>
<tr>
<th>patient ID</th>
<th>gender</th>
<th>firstname</th>
<th>lastname</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['patient_No'] . "</td>";
echo "<td>" . $row['gender'] . "</td>";
echo "<td>" . $row['firstname'] . "</td>";
echo "<td>" . $row['lastname'] . "</td>";
echo "</tr>";
}
echo "</table>";

mysqli_close($con);
?>

