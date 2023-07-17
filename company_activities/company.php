<?php
$Name=$_POST['name'];


$Phone=$_POST['phone'];



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

$sql = "INSERT INTO company  ( name,phone_no)
VALUES ('$Name','$Phone')";

if ($conn->query($sql) === TRUE) {
  header("Location: company-login.html");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>