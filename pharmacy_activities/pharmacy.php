<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "drug dispensing tool";
//Create connection
$conn=new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
    die("Connection failed".$conn->connect_error);
}

$Name=$_POST['name'];


$address=$_POST['address'];
$pno=$_POST['pno'];

$sql="INSERT INTO pharmacies(name,address,phone_no)
VALUES('$Name','$address','$pno')";
if ($conn->query($sql) === TRUE) {
    header("pharmacyLogin.html");
    
    
    
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
?>