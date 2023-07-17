<?php
include'pharmacyLogin.php';
$servername="localhost";
$username="root";
$password="";
$dbname="drug dispensing tool";
$conn=new mysqli($severname,$username,$password,$dbname);
if($conn->connnect_error){
    die("Connection failed.".$conn->connnect_error);

}
$drug_id=$_POST['drug_id'];
$decrease=10;
$sql="UPDATE quantity FROM drug in pharmacies WHERE pharmacy=? AND drug_no=?";
$stmt = $conn->prepare($sql);

// Bind the input parameters
$stmt->bind_param("iis", $decrease, $drug_id,$pharmacy)

// Execute the prepared statement
$stmt->execute();

// Check if the query was successful
if ($stmt->affected_rows > 0) {
    echo "Medication checked out.";
} else {
    echo "Failed to decrease medication quantity.";
}

// Close the prepared statement
$stmt->close();

// Close the database connection
$conn->close();
?>







?>