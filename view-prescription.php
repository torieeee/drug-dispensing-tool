<?php
include 'database1.php';
include 'loginPatient.php';
$sql="SELECT * FROM prescriptions WHERE SSN=?";
$stmt=$conn->prepare($sql);
if($stmt){
    $stmt->bind_param("s",$SSN);
    $result
}

?>