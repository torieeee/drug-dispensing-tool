<?php
include 'database1.php';
session_start();
$patient_id=$_POST['patient'];
$doctor_ssn=$_SESSION['SSN'];
$diagnosis = isset($_POST['diagnosis']) ? $_POST['diagnosis'] : '';
$prescription = isset($_POST['prescription']) ? $_POST['prescription'] : '';
$recommendations = isset($_POST['recommendations']) ? $_POST['recommendations'] : '';
$recommended = isset($_POST['recommended']) ? $_POST['recommended'] : '';


$sql="INSERT INTO prescription (patient_ssn,doctor_ssn,drugs,pharmacy_recommended,recommendations,diagnosis)
VALUES(?,?,?,?,?,?)";
$stmt=$conn->prepare($sql);
$stmt->bind_param("ssssss", $patient_id, $doctor_ssn, $prescription, $recommended, $recommendations, $diagnosis);
if($stmt->execute()){
    echo"Prescription posted!";
}else{
    echo"Error: ".$sql."<br>".$conn->error;
}
?>