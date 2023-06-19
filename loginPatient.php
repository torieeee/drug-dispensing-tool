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


$FirstName=$_POST['first'];
$LastName=$_POST['last'];




$SSN=$_POST['SSN'];

$sql="SELECT * FROM patients WHERE first_name=?  AND SSN=?"; 
$stmt = $conn->prepare($sql);
if ($stmt) {
    // Bind the values to the prepared statement
    $stmt->bind_param("ss", $FirstName, $SSN);
 // Debug information
 
    // Execute the prepared statement
    $stmt->execute();

    // Check if any rows were returned
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
      echo '
    
        <h1

            style="font-family: Edwardian Script ITC, cursive;">Welcome'.$Name.'  </br>
            What do we have lined up for you today?</h1>
        <input style="color:blue;background-color: aquamarine;" ; type="button"
            value="View other specialists?"><br><br>
     <input style="color:blue;background-color: aquamarine;" type="button" value="View Requests"><br><br>
     <input style="color:blue;background-color: aquamarine;" type="button" value=" Prescibe medication"><br><br>
        <input style="color:blue;background-color: aquamarine; " type="button"
            value=" View contaracts from different places "><br><br>
      <input style="color:blue;background-color: aquamarine; " type="button" value=" Approve pharmacy "><br><br>';
    

    } else {
        echo "Login failed";
    }
    // Close the prepared statement
    $stmt->close();
} else {
    echo "Error: " . $conn->error;
}
?>