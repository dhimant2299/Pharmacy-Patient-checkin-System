<?php
$checkin_date = $_POST['checkin_date'];
$checkin_time = $_POST['checkin_time'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$insurance_no = $_POST['insurance_no'];
$test = $_POST['test'];
//$test_type = $_POST['test_type'];

// Database connection

$conn = new mysqli('localhost', 'root', '', 'patient');
if($conn->connect_error){
    die('Connection Failed: '.$conn->connect_error);
}
else{
    $stmt = $conn -> prepare("Insert into patient_info(checkin_date, checkin_time, firstname, lastname, email, age, gender, insurance_no, test) values (?,?,?,?,?,?,?,?,?)");
    
    $stmt -> bind_param("sssssssss", $checkin_date, $checkin_time, $firstname, $lastname, $email, $age, $gender, $insurance_no, $test);
    $stmt -> execute();
    

    echo "The patient has been successfully checked-in." ;
    echo "<table padding=15px width=70% align='center' color='blue' cellspacing='2' cellpadding='2' border='1'>
    <tr>
    
    <th>firstname</th>
    <th>lastname</th>
    <th>gender</th>
    <th>Test</th>
    </tr>";
    echo "<tr>";
    
    
    echo "<td>" . $firstname . "</td>";
    echo "<td>" . $lastname . "</td>";
    echo "<td>" . $gender . "</td>";
    echo "<td>" . $test . "</td>";
    echo "</tr>";
    

    $stmt -> close();
    $conn -> close();

    echo "<br>";
    echo "
    <a align='center' href = homepage.html class= button> Home Page</a>";

}



?> 