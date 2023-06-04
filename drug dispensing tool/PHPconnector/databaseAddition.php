<?php

include_once("databaseConnector.php");

//server method post, we check whether the fields have data to be input
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])){
  if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['newPass'])&& isset($_POST['confirmPass'])){

    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['newPass'];
    $confirmPass = $_POST['confirmPass'];

    
    $sql = "INSERT INTO userdatabase(Username, Email, Password, ConfirmPassword) VALUES ('$name', '$email', '$password', '$confirmPass')";

    if($conn -> query($sql) === TRUE){
      echo "connection is successful";
    }
    else{
      echo "connection failed";
    }

  }
}

//$sql statements to insert the data from the form to the database;
//$sql statement can be modified for addition of data 
//statement that checks whether the $sql statement was successfully added or not



?>