
<?php
$servername="localhost";
$username="root";
$dbname="drug dispensing tool";
$password="";
$conn=new mysqli($servername,$username,$dbname,$password);
if(conn->coonect_error){
    die("Connection failed".$conn->connect_error);

}
$no=$_POST['drug_no'];
$sql="DELETE FROM drug_info WHERE drug_no=?";
$stmt=$conn->prepare($sql);
if($stmt){
    $stmt->bind_param("s",$no);
if ($stmt->execute()) {
    $result = $stmt->get_result();
    echo"Drug successfully deleted!";
    $stmt->close();
}else{// Handle the execution error
    echo "Error executing statement: " . $stmt->error;}
    $conn->close();

}

?>