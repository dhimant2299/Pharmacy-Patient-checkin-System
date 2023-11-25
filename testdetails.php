<?php

$date = $_POST['date'];
$test = $_POST['test'];




// Database connection

$conn = new mysqli('localhost', 'root', '', 'patient');
if($conn->connect_error){
    die('Connection Failed: '.$conn->connect_error);
}
else{
    

    $result = mysqli_query($conn,"SELECT `test` `result`, `description`, `doctor_ID`FROM `test_results` WHERE `test`= '$test'");

echo "<table padding=15px width=70% align='center' color='blue' cellspacing='2' cellpadding='2' border='1' border='1'>
<tr>
<th>Test</th>
<th>Results</th>
<th>Description</th>
<th>Doctor_ID</th>




</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $test . "</td>";
echo "<td>" . $row['result'] . "</td>";
echo "<td>" . $row['description'] . "</td>";
echo "<td>" . $row['doctor_ID'] . "</td>";


echo "</tr>";
}
echo "</table>";


    
   
    $conn -> close();
    echo "<br>";
    echo "
    <a href = homepage.html class= button padding=15px width=70% align='center'> Home Page</a>";
}


?>