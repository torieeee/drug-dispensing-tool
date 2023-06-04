<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

//create database

$sql=" CREATE DATABASE MINE";
if($conn->query($sql)===TRUE){
  echo "DATABASE CREATED SUCCESSFULLY";

}else { echo "error creating database".conn->error;}
/*
require_once(connection.php)
$first_name="Mary";
$email="mary@gmail.com";
$phone="0723456789";
$last_name="james";
$sql="INSERT INTO  Patients(first_name,last_name,email)
VALUES ('$first_name','$last_name','$email')";
echo ($sql);

*/
?>