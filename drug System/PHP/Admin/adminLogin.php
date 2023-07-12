<?php

include_once("C:/xampp/htdocs/drug System/PHP/connectorclass.php");

$nameArr = array(); 
$pwrArr = array();

if(isset($_POST["name"]) && isset($_POST["password"])){

  $first = $_POST["name"];
  $pwrd = $_POST["password"];
}

$sql = "SELECT userName,userPassword FROM `admindetails`";
$result = $conn->query($sql);
if ($result -> num_rows > 0){
  while($row = $result->fetch_assoc()){ 
    array_push($nameArr,$row["userName"]);
    array_push($pwrArr,$row["userPassword"]);
   
    
  }
}
else{
  echo "0 rows are present";
}


if(in_array($first,$nameArr) === TRUE && in_array($pwrd,$pwrArr)){

  header('Location: /drug system/HTML/adminPanel.html') or die("failed");
  
}

else{

  echo "incorrect details";

}


?>