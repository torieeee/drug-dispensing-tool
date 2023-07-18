<?php
include 'database1.php';
session_start();


$symptoms=$_POST['symptoms'];
$specialist=$_POST['specialist'];
$SSN=$_SESSION['SSN'];

$sql="INSERT INTO symptom(patient_ssn,specialist,symptoms)
VALUES('$SSN','$specialist','$symptoms')";
if($conn->query($sql)===TRUE){
    header("Location: view_prescriptions.php");
    exit();
}else{
    echo"Error: ".$sql."<br>".$conn->error;
}
  ?>