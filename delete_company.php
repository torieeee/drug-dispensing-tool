<?php
include 'database1.php';
$name=$_POST['name'];
$sql="DELETE FROM company WHERE name=?";
$stmt=$conn->prepare($sql);
if($stmt){
    $stmt->bind_param("s",$name);
   if($stmt->execute()) {
    $result=$stmt->get_result();
    $stmt->close();
   }else{
    echo"Error executing statement".$stmt_error;
   }
    $conn->close();
}
?>