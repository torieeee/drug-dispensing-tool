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


$Name=$_POST['name'];



$Phone=$_POST['Phone'];

$sql="SELECT * FROM companies WHERE name =?  AND phone_no =?"; 
$stmt = $conn->prepare($sql);
if ($stmt) {
    // Bind the values to the prepared statement
    $stmt->bind_param("ss", $Name, $Phone);
 // Debug information
 echo "SQL query: " . $sql . "<br/>";
 echo "Binding parameters: " . $Name . ",  " . $Phone . "<br/>";
    // Execute the prepared statement
    $stmt->execute();

    // Check if any rows were returned
    $result = $stmt->get_result();
    if ($result->num_rows > 0) { echo'
        <body>
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
        echo "Login failed";
    }
    // Close the prepared statement
    $stmt->close();
} else {
    echo "Error: " . $conn->error;
}

