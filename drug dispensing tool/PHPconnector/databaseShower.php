<?php

include_once("databaseConnector.php");

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])){
  if(isset($_POST["username"]) && isset($_POST["password"])){

    $username = $_POST['username'];
    $password = $_POST['password'];


    $sql = "SELECT 'Username', 'Password' FROM userdatabase";
    $results = $conn -> query($sql);
    $row = $results -> fetch_assoc();


    print_r($row);

    
  // addition of extra features to show data for the database i.e a for loop
   

  }
}

?>
