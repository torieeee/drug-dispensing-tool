<?php


$conn=mysqli_connect("localhost","root","","drug dispensing tool");
$sql="SELECT * FROM patients";
$results=$conn->query($sql);
$row=$results->fetch_assoc();


echo $row["first_name"]
?>