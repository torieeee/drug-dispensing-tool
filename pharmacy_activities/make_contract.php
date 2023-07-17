<?php
$servername="localhost";
$username="root";
$password="";
$dbname="drug dispensing tool";
$conn= new mysqli($servername,$username,$dbname,$password);
if($conn->connect_error){
    die("Connection failed.".$conn->connect_error)
}
$company=$_POST['company'];
$pharmacy=$_POST['pharmacy'];
$terms=$_POST['terms'];
$supervisor=$_POST['supervisor'];
$end=$_POST['end_date'];
$drugs=$_POST['drugs']
$sql="INSERT INTO contracts(company,pharmacy,terms,supervisor,end_date,drugs)
VALUES('$company','$pharmacy','$terms','$supervisor','$end','$drugs')";
if($conn->query($sql)===TRUE){
    echo"Succesful contract";
}else{
    echo"Error: ".$sql."<br>".$conn->error;
}
?>