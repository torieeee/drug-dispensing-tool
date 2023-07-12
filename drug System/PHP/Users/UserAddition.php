<?php

  include_once("C:/xampp/htdocs/drug System/PHP/connectorclass.php");


  if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])){
    if(isset($_POST['fname']) && isset($_POST['sname']) && isset($_POST['ssn'])&& isset($_POST['pno']) && isset($_POST['address']) && isset($_POST['age']) && isset($_POST['pw'])){
  

      $fname = $_POST['fname'];
      $sname = $_POST['sname'];
      $ssn  = $_POST['ssn'];
      $pno = $_POST['pno'];
      $address = $_POST['address'];
      $age = $_POST['age'];
      $pw = $_POST['pw'];




    $sql = "INSERT INTO `patient details` (Fname, Sname, SSN, phoneNumber, addr, Age, pwrd) 
    VALUES ('$fname','$sname','$ssn','$pno','$address','$age','$pw')";
    

    if ($conn->query($sql) === TRUE) {
      header('Location: /drug system/MISC HTML FILES/successful.html') or die("failed");
    } else {
      header('Location: /drug system/MISC HTML FILES/failure.html') or die("failed");
    }

    $conn->close();
  }
}


?>