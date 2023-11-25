<?php

$checkout_time = $_POST['checkout_time'];
$insurance_no = $_POST['insurance_no'];
$test = $_POST['test'];


// Database connection

$conn = new mysqli('localhost', 'root', '', 'patient');
if($conn->connect_error){
    die('Connection Failed: '.$conn->connect_error);
}
else{
    $stmt = $conn -> prepare("Insert into patient_checkout(checkout_time, insurance_no,test) values (?,?,?)");
    
    $stmt -> bind_param("sss", $checkout_time, $insurance_no,$test);
    $stmt -> execute();
    

    echo "Patient Details" ;
    echo "<br>";

    $result = mysqli_query($conn,"SELECT DISTINCT * FROM patient_info INNER JOIN patient_checkout ON patient_info.insurance_no  = patient_checkout.insurance_no WHERE patient_info.insurance_no= $insurance_no;");

    echo "<table padding=15px width=70% align='center' color='blue' cellspacing='2' cellpadding='2' border='1' border='2'>
<tr>
<th>patient ID</th>
<th>Check-in date</th>
<th>Check-in time</th>
<th>Check-out time</th>
<th>firstname</th>
<th>lastname</th>
<th>age</th>
<th>gender</th>
<th>Email Address</th>




</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['patient_No'] . "</td>";
echo "<td>" . $row['checkin_date'] . "</td>";
echo "<td>" . $row['checkin_time'] . "</td>";
echo "<td>" . $row['checkout_time'] . "</td>";
echo "<td>" . $row['firstname'] . "</td>";
echo "<td>" . $row['lastname'] . "</td>";
echo "<td>" . $row['age'] . "</td>";
echo "<td>" . $row['gender'] . "</td>";
echo "<td>" . $row['email'] . "</td>";



echo "</tr>";
}
echo "</table>";

echo "Test Details" ;

$result1 = mysqli_query($conn,"SELECT * FROM `test_results` WHERE insurance_no=$insurance_no;");

echo "<table padding=15px width=70% align='center' color='blue' cellspacing='2' cellpadding='2' border='1' color='blue' cellspacing='2' cellpadding='3' border='1'>
<tr>
<th>Insurance Number</th>
<th>Test Conducted</th>
<th>Results</th>
<th>Description</th>
<th>Doctor</th>




</tr>";

while($row = mysqli_fetch_array($result1))
{
echo "<tr>";
echo "<td>" . $row['insurance_no'] . "</td>";
echo "<td>" . $row['test'] . "</td>";
echo "<td>" . $row['result'] . "</td>";
echo "<td>" . $row['description'] . "</td>";
echo "<td>" . $row['doctor_ID'] . "</td>";




echo "</tr>";
}
echo "</table>";




    
    $stmt -> close();
    $conn -> close();

    echo "<br>";
    echo "
    <a style=margin-bottom: '15px' display: 'flex' align-items: 'center' text-align: 'center' href = homepage.html class= button> Home Page</a>";
}


?> 