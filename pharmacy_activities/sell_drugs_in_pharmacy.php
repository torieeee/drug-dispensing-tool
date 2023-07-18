<?php
include 'database1.php';
session_start();
$drug_id = isset($_POST['drug']) ? $_POST['drug'] : '';
$decrease = isset($_POST['quantity']) ? $_POST['quantity'] : '';


$_SESSION['Name']=$pharmacy;
$sql="UPDATE drugs_in_pharmacy SET quantity_in_mgs = quantity_in_mgs - ?  WHERE pharmacy_name=? AND drug_no=?";
$stmt = $conn->prepare($sql);
if($stmt){

// Bind the input parameters
$stmt->bind_param("isi", $decrease, $pharmacy,$drug_id);

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
}else{ echo'failed';}
$sql1="INSERT INTO sold(drug_no,quantity,pharmacy)
VALUES('$drug_id','$decrease','$pharmacy')";
if($conn->query($sql)===TRUE){

    echo "sold";
    exit();
}else{
    echo"Error: ".$sql."<br>".$conn->error;
}
// Close the database connection
$conn->close();
?>







?>