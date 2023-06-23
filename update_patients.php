<?php
$firstName=$_POST['fname'];

$lastName=$_POST['sname'];

$password1=$_POST['pw'];

$address= $_POST['address'];

$SSN=$_POST['ssn'];

$email=$_POST['email'];

$age=$_POST['age'];

$pno=$_POST['pno'];
     


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

$sql = "UPDATE patients SET first_name=?, last_name=?, address=? , age=?, email=? , phone_no=? , password=? WHERE SSN=?";
$stmt=$conn->prepare($sql);
if($stmt){
  $stmt->bind_param("sssisiss",$firstName, $lastName, $address, $age, $email, $pno, $password1, $SSN);

if ($stmt->execute()) {
  // Retrieve the updated values from the database
  $sql = "SELECT first_name, last_name, SSN FROM patients WHERE SSN = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $SSN);
  $stmt->execute();
  $stmt->bind_result($updatedFirstName, $updatedLastName, $updatedSSN);
  $stmt->fetch();
  echo '<form name="register" action="TRYIT.PHP" method="post">
    <h3>Welcome back!</h3>
    <p>First Name : <input type="text" name=first id="first" /></p>
    <p>Last Name : <input type="text" name=last id="last" /></p>
    <p>SSN : <input type="text" name="SSN" id="SSN"></p>
    <p><input type="submit" name="submit" value="SIGN IN" /></p>
    <input type="reset">
    <a href="signup.html">If you do not have an account? Create a new one!</a>

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