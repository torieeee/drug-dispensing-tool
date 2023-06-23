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
$sql = "UPDATE companies SET phone_no=?, Name=? WHERE Name=?";
$stmt=$conn->prepare($sql);
if($stmt){
  $stmt->bind_param("is",$Phone,$Name,);
  if ($stmt->execute()) {
    // Retrieve the updated values from the database
    $sql = "SELECT * FROM companies WHERE Name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $SSN);
    $stmt->execute();
    $stmt->bind_result($updatedFirstName, $updatedLastName, $updatedSSN);
    $stmt->fetch();
    echo '<body>
    <h1
    style="font-family:edwardian system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif ;">
    welcome !'.$Name.' What would you like to do today?</h1>

<input style="color:blue;background-color: aquamarine;" type="button" onclick="goToAnotherForm()"
    value="View drugs available"><br><br>
<script>
    function goToAnotherForm() {
        window.location.href = "view_specialist.php"; // Replace with the URL or file path of the another form
    }
</script>
<input style="color:blue;background-color: aquamarine;" type="button" value="Show new medication"><br><br>
<input style="color:blue;background-color: aquamarine;" type="button" value=" Release a new drug"><br><br>
<input style="color:blue;background-color: aquamarine; " type="button"
    value=" Revoke or terminate a contract"><br><br>
<input style="color:blue;background-color: aquamarine; " type="button" value=" Make a new Contract "><br><br>
</body>';
} else {
  echo "Error: " .$stmt->error;
}
$stmt->close();
}else {
    echo "Error preparing statement: " . $conn->error;
}
$conn->close();
?>