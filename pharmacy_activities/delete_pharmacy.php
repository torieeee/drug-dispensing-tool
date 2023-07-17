
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "drug dispensing tool";
//Create connection
$conn=new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
    die("Connection failed".$conn->connect_error);
}

$name=$_POST['name'];
$sql="DELETE FROM pharmacy WHERE name =?"; 
$stmt = $conn->prepare($sql);
if ($stmt) {
    // Bind the values to the prepared statement
    $stmt->bind_param("s", $name);
 // Debug information
 if ($stmt->execute()) {
    $result = $stmt->get_result();
    
    header("Location:welcome_page.html");
    $stmt->close();
} else {
    // Handle the execution error
    echo "Error executing statement: " . $stmt->error;
} 
$conn->close();
    
    
}
?>