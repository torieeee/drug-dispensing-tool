<?php
include 'database1.php';
$company=$_POST['company'];
$pharmacy=$_POST['pharmacy'];
$terms=$_POST['terms'];
$supervisor=$_POST['supervisor'];
$end=$_POST['end_date'];
$drugs=$_POST['drugs'];
$sql="INSERT INTO contract(company,pharmacy,terms,supervisor,end_date,drugs_delivered)
VALUES('$company','$pharmacy','$terms','$supervisor','$end','$drugs')";
if($conn->query($sql)===TRUE){
    echo"Succesful contract";
}else{
    echo"Error: ".$sql."<br>".$conn->error;
}
?>