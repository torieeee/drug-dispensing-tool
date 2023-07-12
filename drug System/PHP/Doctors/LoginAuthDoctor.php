<?php

session_start();

include_once("C:/xampp/htdocs/drug System/PHP/connectorclass.php");

$nameArr = array(); 
$pwrArr = array();

if(isset($_POST["name"]) && isset($_POST["password"])){

  $first = $_POST["name"];
  $pwrd = $_POST["password"];
  $_SESSION["userVar"] = $first;

}

$sql = "SELECT DoctorName,DoctorPassword FROM `doctordetails`";
$result = $conn->query($sql);
if ($result -> num_rows > 0){
  while($row = $result->fetch_assoc()){ 
    array_push($nameArr,$row["DoctorName"]);
    array_push($pwrArr,$row["DoctorPassword"]);
   
    
  }
}
else{
  echo "0 rows are present";
}


if(in_array($first,$nameArr) === TRUE && in_array($pwrd,$pwrArr)){

  header('Location: /drug system/PHP/UserPages/welcomeDoctors.php') or die("failed");
  
}

else{

  echo "incorrect details";
 

}




 

?>

