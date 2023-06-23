<?php
$Name=$_POST['name'];


$SSN=$_POST['ssn'];

$email=$_POST['email'];

$yoe=$_POST['yoe'];
$speciality=$_POST['speciality'];
     


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "drug dispensing tool";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "UPDATE doctors SET SSN=? Name=?, yoe=?, speciality=? , email=? WHERE SSN=?";
$stmt=$conn->prepare($sql);
if($stmt){
  $stmt->bind_param("sssss",$SSN,$Name, $speciality,$yoe,$email);

if ($stmt->execute()) {
  // Retrieve the updated values from the database
  $sql = "SELECT name, yoe, speciality,email FROM patients WHERE SSN = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $SSN);
  $stmt->execute();
  $stmt->bind_result($updatedFirstName, $updatedLastName, $updatedSSN);
  $stmt->fetch();
  echo'<form name="Doctor\'s login form" action="doctor_login.php" method="post">
  <h3>Karibu daktari!</h3>
  <p>Name: <input type="text" name=first /></p>

  <p>SSN : <input type="text" name="SSN"></p>
  <p><input type="submit" name="submit" value="SIGN IN" /></p>
  <input type="reset">

</form>';
} else {
    echo "Error: " .$stmt->error;
  }
  $stmt->close();
  }else {
      echo "Error preparing statement: " . $conn->error;
  }
  $conn->close();
  ?>