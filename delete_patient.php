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
$ssn=$_POST['doctor_SSN'];
$sql="DELETE * FROM doctors WHERE SSN =?"; 
$stmt = $conn->prepare($sql);
if ($stmt) {
    // Bind the values to the prepared statement
    $stmt->bind_param("s", $SSN);
 // Debug information
 
    // Execute the prepared statement
   if( $stmt->execute()){
    $result = $stmt->get_result();
    echo' <body>
    <h1>Welcome to tolee!</h1>
    <h2>What would you like to do?</h2>
    <button onclick="goToAnotherForm()">Register</button></br></br>

    <!-- JavaScript code to navigate to another form -->
    <script>
        function goToAnotherForm() {
            window.location.href = "Register.html"; // Replace with the URL or file path of the another form
        }
        function goToAnotherForm2() {
            window.location.href = "login.html"; // Replace with the URL or file path of the another form
        }

    </script>
    <button onclick="goToAnotherForm2()">Login</button></br></br>
</body>';

        
        // Handle the result as needed
        
        // Close the statement
        $stmt->close();
    } else {
        // Handle the execution error
        echo "Error executing statement: " . $stmt->error;
    } 
    $conn->close();
    
}