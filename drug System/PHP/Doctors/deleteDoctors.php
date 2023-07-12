<?php

  include_once("C:/xampp/htdocs/drug System/PHP/connectorclass.php");
  include("C:/xampp/htdocs/drug System/PHP/DeletionClass.php");



  $password = $_POST["password"];
  $sql = new deletion('patient details','pwrd',$password);

      
    
  if ($conn->query($sql->sqlstmt) === TRUE) {
     echo "record deleted successfully";
     header('Location: /drug system/signInForms.html') or die("failed");

      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }


 



?>