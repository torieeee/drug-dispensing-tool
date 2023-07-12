<?php

  include_once("C:/xampp/htdocs/drug System/PHP/connectorclass.php");
  include("C:/xampp/htdocs/drug System/PHP/DeletionClass.php");



  $name = $_POST["patient_delete"];
  $sql = new deletion('patient details','Fname',$name);

      
    
  if ($conn->query($sql->sqlstmt) === TRUE) {
     echo "record deleted successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }


 



?>
