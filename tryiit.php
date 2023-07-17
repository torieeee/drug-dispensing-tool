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


$first_name = "mary";
$last_name="james";
$email="marry@gmail.com";
$phone="07333424322";


$sql = "INSERT INTO Patients (first_name,last_name,email)

VALUES('$first_name','$last_name','$email')";

if ($conn->query($sql)===TRUE){
   echo "NEW WORLD RECORD CREATED SUCCCESFULLY";

}else
 {
    echo"ERROR:".$sql. "<br>" .$conn->error;

}
$conn->close();
?>