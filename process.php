<?php
$firstName=$_POST['fname'];

$lastName=$_POST['sname'];

$password1=$_POST['pw'];

$address= $_POST['address'];

$SSN=$_POST['ssn'];

$email=$_POST['email'];

$age=$_POST['age'];

$pno=$_POST['pno'];
     


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

$sql = "INSERT INTO patient (first_name, last_name,email,phone_no,address,date_of_birth,password,SSN)
VALUES ('$firstName','$lastName','$email','$pno','$address','$age','$password1','$SSN')";

if ($conn->query($sql) === TRUE) {
  header("Location: form.html");
  
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

?>