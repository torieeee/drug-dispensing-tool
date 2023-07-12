<?php

  include_once("C:/xampp/htdocs/drug System/PHP/connectorclass.php");


  if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])){
    if(isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['companyAddress'])&& isset($_POST['password'])){
  

      $name = $_POST['name'];
      $phone = $_POST['phone'];
      $companyAddress  = $_POST['companyAddress'];
      $password = $_POST['password'];
    




    $sql = "INSERT INTO `companydetails` (CompanyName, CompanyPhone, CompanyAddress, CompanyPassword) 
    VALUES ('$name', '$phone', '$companyAddress', '$password')";
    

    if ($conn->query($sql) === TRUE) {
      header('Location: /drug system/MISC HTML FILES/successful.html') or die("failed");
    } else {
      header('Location: /drug system/MISC HTML FILES/failure.html') or die("failed");
    }

    $conn->close();
  }
}


?>