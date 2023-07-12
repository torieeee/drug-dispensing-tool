<?php

session_start();

include_once("C:/xampp/htdocs/drug System/PHP/connectorclass.php");

$nameArr = array(); 
$pwrArr = array();

if(isset($_POST["first"]) && isset($_POST["password"])){

  $first = $_POST["first"];
  $pwrd = $_POST["password"];
  $_SESSION["userVar"] = $first;

}

$sql = "SELECT Fname,pwrd FROM `patient details`";
$result = $conn->query($sql);
if ($result -> num_rows > 0){
  while($row = $result->fetch_assoc()){ 
    array_push($nameArr,$row["Fname"]);
    array_push($pwrArr,$row["pwrd"]);
   
    
  }
}
else{
  echo "0 rows are present";
}


if(in_array($first,$nameArr) === TRUE && in_array($pwrd,$pwrArr)){

  header('Location: /drug system/PHP/UserPages/welcomePatients.php') or die("failed");
  
}

else{

  echo "incorrect details";
 

}




 

?>

