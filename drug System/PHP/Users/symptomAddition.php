<?php

  include_once("C:/xampp/htdocs/drug System/PHP/connectorclass.php");


  if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])){
    if(isset($_POST['patientName']) && isset($_POST['patientSymptoms'])){

      $symptomID = $_POST['symptomID'];
      $patientName = $_POST['patientName'];
      $patientSymptoms = $_POST['patientSymptoms'];
      $options = $_POST['options'];
      
    

    $sql = "INSERT INTO `symptomdetails` (SymptomID ,patientName, patientSymptoms, doctorSSN) 
    VALUES ('$symptomID' ,'$patientName', '$patientSymptoms', '$options')";
    

    if ($conn->query($sql) === TRUE) {
      echo "symptoms were successfully added";
    } else {
      echo "symptoms were not added";
    }

    $conn->close();
  }
}


?>