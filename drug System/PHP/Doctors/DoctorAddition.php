<?php

  include_once("C:/xampp/htdocs/drug System/PHP/connectorclass.php");


  if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])){
    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['ssn'])&& isset($_POST['speciality']) && isset($_POST['yoe']) &&  isset($_POST['password'])){
  

      $name = $_POST['name'];
      $email = $_POST['email'];
      $ssn  = $_POST['ssn'];
      $specialty = $_POST['speciality'];
      $yoe = $_POST['yoe'];
      $password = $_POST['password'];
  




    $sql = "INSERT INTO `doctordetails`(DoctorName, Email ,SSN, Specialty, YOE, DoctorPassword) 
    VALUES ('$name','$email','$ssn','$specialty','$yoe','$password')";
    

    if ($conn->query($sql) === TRUE) {
      header('Location: /drug system/MISC HTML FILES/successful.html') or die("failed");
    } else {
      header('Location: /drug system/MISC HTML FILES/failure.html') or die("failed");
    }

    $conn->close();
  }
}


?>