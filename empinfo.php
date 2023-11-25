<?php


$position = $_POST['position'];
$empfirst_name = $_POST['empfirst_name'];
$emplast_name = $_POST['emplast_name'];
$certification = $_POST['certification'];
$salary = $_POST['salary'];


// Database connection

$conn = new mysqli('localhost', 'root', '', 'patient');
if($conn->connect_error){
    die('Connection Failed: '.$conn->connect_error);
}
else{
    $stmt = $conn -> prepare("INSERT INTO `employee`(`position`, `empfirst_name`, `emplast_name`, `certification`, `salary`) VALUES (?,?,?,?,?)");
    
    $stmt -> bind_param("sssss", $position, $empfirst_name, $emplast_name,$certification,$salary);
    $stmt -> execute();
    

    echo "The Information has been successfully uploaded." ;
    
    echo "<br>";
    echo "
    <a href = homepage.html class= button> Home Page</a>";

}



?> 