<?php
include 'pharmacyLogin.php'
$servername="localhost";
$username="root";
$password="";
$dbname="drug dispensing tool";
$conn=new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
    die("Connection failed".$conn->connect_error);
}
$drugNo=$_POST['drug_no'];

$quantity=$_POST['formula'];
$company=$_POST['company'];
$price=$_POST['price'];
$sql="INSERT INTO drugs in pharmacy(drug_no,quantity_in_mgs,pharmacy_name,company,price)
VALUES('$drugNo','$quatity','$Name','$company','$price')";
if($conn->query($sql)===TRUE){
    echo"New drug added succesfully";
}

?>