
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

$sql = "INSERT INTO patients (first_name, last_name,email,phone_no,address,age,password,SSN)
VALUES (' $firstName','$lastName','$email','$pno','$address','$age','$password1','$SSN')";

if ($conn->query($sql) === TRUE) {
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
  echo "Error: " . $sql . "<br>" . $conn->error;
}

?>