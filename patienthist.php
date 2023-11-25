<?php

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$insurance_no = $_POST['insurance_no'];



// Database connection

$conn = new mysqli('localhost', 'root', '', 'patient');
if($conn->connect_error){
    die('Connection Failed: '.$conn->connect_error);
}
else{
    

    $result = mysqli_query($conn,"SELECT DISTINCT * 
    FROM `patient_info` INNER JOIN `test_results`ON `patient_info`.insurance_no = `test_results`.insurance_no  WHERE patient_info.insurance_no=$insurance_no;");

echo "<table padding=15px width=70% align='center' color='blue' cellspacing='2' cellpadding='2' border='1' border='1'>
<tr>
<th>patient ID</th>
<th>check-in date</th>
<th>firstname</th>
<th>lastname</th>
<th>Insurance</th>
<th>gender</th>
<th>test</th>



</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['patient_No'] . "</td>";
echo "<td>" . $row['checkin_date'] . "</td>";
echo "<td>" . $row['firstname'] . "</td>";
echo "<td>" . $row['lastname'] . "</td>";
echo "<td>" . $row['insurance_no'] . "</td>";
echo "<td>" . $row['gender'] . "</td>";
echo "<td>" . $row['test'] . "</td>";

echo "</tr>";
}
echo "</table>";


    
   
    $conn -> close();
    echo "<br>";
    echo "
    <a href = homepage.html class= button> Home Page</a>";
}


?>