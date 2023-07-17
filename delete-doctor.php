<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "drug dispensing tool";
//Create connection
$conn=new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
    die("Connection failed".$conn->connect_error);
}

$ssn = isset($_POST['doctor_SSN']) ? $_POST['doctor_SSN'] : '';
$ssn = $conn->real_escape_string($ssn);
$sql="DELETE  FROM doctor WHERE SSN =?"; 
$stmt = $conn->prepare($sql);
if ($stmt) {
    // Bind the values to the prepared statement
    $stmt->bind_param("s", $ssn);
 // Debug information
 
    // Execute the prepared statement
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        header("Location: welcome_page.html");
        
        $stmt->close();
    } else {
        // Handle the execution error
        echo "Error executing statement: " . $stmt->error;
    } 
    $conn->close();
    
}