<?php
session_start();
$servername="localhost";
$username="root";
$password="";
$dbname="drug dispensing tool";
$conn=new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
    die("Connection failed".$conn->connect_error);
}
$Name=isset($_POST['pharmacy'])?$_POST['pharmacy']:'';
$company=isset($_POST['company'])?$_POST['company']:'';
$drugNo=isset($_POST['drug_no'])?$_POST['drug_no']:'';
$company=isset($_POST['company'])?$_POST['company']:'';
$price=isset($_POST['price'])?$_POST['price']:'';
$formula=isset($_POST['formula'])?$_POST['formula']:'';
$quantity=isset($_POST['quantity'])?$_POST['quantity']:'';


$sql="INSERT INTO drug_in_pharmacy(drug_no,quantity_in_mgs,pharmacy_name,company)
VALUES('$drugNo','$quantity','$Name','$company')";
if($conn->query($sql)===TRUE){
    echo"New drug added succesfully";
}

?>