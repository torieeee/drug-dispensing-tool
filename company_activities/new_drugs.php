<?php
$servername="localhost";
$username="root";
$password="";
$dbname="drug dispensing tool";
$conn=new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
    die("Connection failed".$conn->connect_error);
}
$drugNo=$_POST['drug_no'];
$Name=$_POST['name'];
$formula=$_POST['formula'];
$company=$_POST['company'];
$price=$_POST['price'];
$sql="INSERT INTO drug_info(drug_no,name,formula,price,company)
VALUES('$drugNo','$Name','$formula','$price','$company')";
if($conn->query($sql)===TRUE){
    echo"New drug added succesfully";
}

?>