<?php

  include_once("C:/xampp/htdocs/drug System/PHP/connectorclass.php");


  if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])){
    if(isset($_POST['name']) && isset($_POST['phoneNumber']) && isset($_POST['address'])&& isset($_POST['password'])){
  

      $name = $_POST['name'];
      $phoneNumber = $_POST['phoneNumber'];
      $address  = $_POST['address'];
      $password = $_POST['password'];
      




    $sql = "INSERT INTO `pharmacydetails` (PharmacyName, PharmacyPhone, PharmacyAddress, PharmacyPassword) 
    VALUES ('$name,'$phoneNumber','$address', '$password')";
    

    if ($conn->query($sql) === TRUE) {
      header('Location: /drug system/MISC HTML FILES/successful.html') or die("failed");
    } else {
      header('Location: /drug system/MISC HTML FILES/failure.html') or die("failed");
    }

    $conn->close();
  }
}


?>