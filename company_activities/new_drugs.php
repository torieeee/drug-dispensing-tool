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
$drugName=$_POST['name'];
$formula=$_POST['formula'];
$company=$_POST['company'];
$price=$_POST['price'];
$sql="INSERT INTO drug_info(drug_no,name,formula,price_per_100mg,company)
VALUES('$drugNo','$drugName','$formula','$price','$company')";
if($conn->query($sql)===TRUE){
    echo"New drug added succesfully";
}else{ echo "error";}

?>