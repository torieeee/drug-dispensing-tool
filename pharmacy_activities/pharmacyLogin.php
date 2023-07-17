<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "drug dispensing tool";
//Create connection
$conn=new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
    die("Connection failed".$conn->connect_error);
}


$Name=$_POST['first'];



$Phone=$_POST['Phone'];
$_SESSION['Name']=$Name;
$_SESSION['Phone']=$Phone;

$sql="SELECT * FROM pharmacies WHERE name =?  AND  phone_no=?"; 
$stmt = $conn->prepare($sql);
if ($stmt) {
    // Bind the values to the prepared statement
    $stmt->bind_param("ss", $Name, $Phone);
 // Debug information
 echo "SQL query: " . $sql . "<br/>";
 echo "Binding parameters: " . $Name . ",  " . $Phone. "<br/>";
    // Execute the prepared statement
    $stmt->execute();

    // Check if any rows were returned
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        header("activities_for_pharmcay.html");
        exit;
    } else {
        echo "Login failed";
    }
    // Close the prepared statement
    $stmt->close();
} else {
    echo "Error: " . $conn->error;
}
?>