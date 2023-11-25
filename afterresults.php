<?php

$insurance_no = $_POST['insurance_no'];
$test = $_POST['test'];
$result = $_POST['result'];
$description = $_POST['description'];
$doctor_ID = $_POST['doctor_ID'];


// Database connection

$conn = new mysqli('localhost', 'root', '', 'patient');
if($conn->connect_error){
    die('Connection Failed: '.$conn->connect_error);
}
else{
    $stmt = $conn -> prepare("Insert into test_results(insurance_no,test, result, description, doctor_ID ) values (?,?,?,?,?)");
    
    $stmt -> bind_param("sssss", $insurance_no, $test, $result, $description, $doctor_ID);
    $stmt -> execute();
    

    echo "The Results have been submitted." ;
    
    $stmt -> close();
    $conn -> close();

    echo "<br>";
    echo "
    <a href = homepage.html class= button> Home Page</a>";
}


?> 