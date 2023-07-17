<?php
include 'loginPatient.php'
$servername="localhost";
$username="root";
$password="";
$dbname="drug dispensing tool";
$conn= new mysqli($servername,$username,$dbname,$password);
if($conn->connect_error){
    die("Connection failed.".$conn->connect_error)
}
$symptoms=$_POST['symptoms'];
$specialist=$_POST['specialist'];

$sql="INSERT INTO symptom(patient_ssn,specialist,symptoms)
VALUES('$SSN','$specialist','$symptoms')";
if($conn->query($sql)===TRUE){
    echo"Succesful contract";
}else{
    echo"Error: ".$sql."<br>".$conn->error;
}
  ?>