<?php

  include_once("C:/xampp/htdocs/drug System/PHP/connectorclass.php");


  if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])){
    if(isset($_POST['doctorName']) && isset($_POST['doctorPrescription'])){

      $prescriptionID = $_POST['prescriptionID'];
      $doctorName = $_POST['doctorName'];
      $doctorPrescription = $_POST['doctorPrescription'];
      
    

    $sql = "INSERT INTO `prescriptiondetails` (prescriptionID ,doctorName, doctorPrescription) 
    VALUES ('$prescriptionID' ,'$doctorName', '$doctorPrescription')";
    

    if ($conn->query($sql) === TRUE) {
      echo "prescriptions were successfully added";
    } else {
      echo "prescriptions were not added";
    }

    $conn->close();
  }
}


?>