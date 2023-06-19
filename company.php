<?php
$Name=$_POST['name'];


$Phone=$_POST['phone'];



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

$sql = "INSERT INTO companies  ( name,phone_no)
VALUES ('$Name','$Phone')";

if ($conn->query($sql) === TRUE) {
  echo '<form action="company_login.php" method="post"></form>
  <h3>Company Sign in</h3>
  <label for="name">Name :</label></br>
  <input type="text" name="name" id="name"></br></br>
  <label for="pno">Phone Number :</label></br>
  <input type="text" name="phone" id="phone"></br>
  <input type="submit" value="Log in"></br>
  <a href="CompanySignUp.html">Don\'t have an account? Sign up instead!</a>
  </form>
    ';
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>