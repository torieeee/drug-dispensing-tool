<?php

  include_once("C:/xampp/htdocs/drug System/PHP/connectorclass.php");


  if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])){
    if(isset($_POST['DrugID']) && isset($_POST['DrugName']) && isset($_POST['DrugPrice']) && isset($_POST['ingredients']) && isset($_POST['CompanyName'])){
  

      $ID = $_POST['DrugID'];
      $Name = $_POST['DrugName'];
      $Price = $_POST['DrugPrice'];
      $ingredients = $_POST['ingredients'];
      $companyName = $_POST['CompanyName'];
    
     
  
    $sql = "INSERT INTO `drugdetails` (DrugID, DrugName, DrugPrice, Ingredients, CompanyName) 
    VALUES ('$ID', '$Name', '$Price', '$ingredients', '$companyName')";
    

    if ($conn->query($sql) === TRUE) {
      echo "drug record was successfully updated";
    } else {
      echo "drug record failed to update";
    }

    $conn->close();
  }
}