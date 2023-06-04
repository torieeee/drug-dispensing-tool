<?php

$host = "localhost";
$username = "root";
$pwrd = "";
$db = "realestatedb";



$conn = new mysqli($host, $username, $pwrd, $db);

if($conn -> connect_error){
  die("connection to database failed");
}

else("connection successful");

?>