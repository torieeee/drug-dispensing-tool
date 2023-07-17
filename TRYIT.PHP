<?php
$firstName=filter_input(INPUT_POST,'first');

$lastName=filter_input(INPUT_POST,'last');
echo "Last Name: ".$lastName."<br/>";
$SSN=filter_input(INPUT_POST,'SSN');
echo "SSN :".$SSN."<br/>";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "drug dispensing tool";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}else{

$sql="SELECT * FROM patients WHERE first_name=? AND SSN=?"; 
$stmt = $conn->prepare($sql);
if ($stmt) {
    // Bind the values to the prepared statement
    $stmt->bind_param("ss", $firstName, $SSN);
 // Debug information
 echo "SQL query: " . $sql . "<br/>";
 echo "Binding parameters: " . $firstName . ",  " . $SSN . "<br/>";
    // Execute the prepared statement
    $stmt->execute();

    // Check if any rows were returned
    $result = $stmt->get_result();
    if( $result->num_rows==0)
    {echo "Login failed";} else {
        echo '<h1
        style="font-family:edwardian system-ui ;">
       Welcome'.$firstName.'</br> What would you like to do today?</h1>
    <input style="color:blue;background-color: aquamarine;" ; type="button" value="Get advice from specialist?"><br><br>
    <input style="color:blue;background-color: aquamarine;" type="button" onclick="goToAnotherForm()"
        value="View doctors available"><br><br>
    <script>
        function goToAnotherForm() {
            window.location.href = "view_specialist.php"; // Replace with the URL or file path of the another form
        }
    </script>
    <input style="color:blue;background-color: aquamarine;" type="button" value="Buy medication"><br><br>
    <input style="color:blue;background-color: aquamarine;" type="button" value=" View your prescriptions"><br><br>
    <input style="color:blue;background-color: aquamarine; " type="button"
        value=" View contaracts from different places "><br><br>
    <input style="color:blue;background-color: aquamarine; " type="button" value=" View your cart "><br><br>';
        
    }
    // Close the prepared statement
    $stmt->close();
} else {
    echo "Error: " . $conn->error;
}
}

?>