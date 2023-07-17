<?php
$Name=$_POST['name'];


$SSN=$_POST['ssn'];

$email=$_POST['email'];

$yoe=$_POST['yoe'];
$speciality=$_POST['specialitist'];
     


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "drug dispensing tool";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO doctor (SSN, name,email,speciality,yoe)
VALUES ('$SSN','$Name','$email','$speciality','$yoe')";

if ($conn->query($sql) === TRUE) {
  header("Location: doctor_login.html");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>