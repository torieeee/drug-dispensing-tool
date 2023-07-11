<?php
include 'doctorLogin.php'
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "drug dispensing tool";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$Name =$_POST['name'] ; // Replace with the actual company name obtained from earlier code
$sql1="SELECT specialization from doctors where SSN=?"
$stmt1=$conn->prepare($sql1);
if($stmt1){
    $stmt1->bind-param("s",$SSN);
    $stmt1->execute();
    $result1=$stmt1->get_result();
    if ($result->num_rows > 0){
        
    }
}

$sql = "SELECT * FROM symptoms WHERE specialist = ?";
$stmt = $conn->prepare($sql);
if ($stmt) {
    // Bind the doctor name to the prepared statement
    $stmt->bind_param("s", $Name);
    
    // Execute the prepared statement
    $stmt->execute();

    // Get the result set
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Start building the HTML table
        echo '<table>
            <thead>
                <tr>
                    <th>Patient name</th>
                    <th>specialist</th>
                    <th>Symptoms</th>
                    
                </tr>
            </thead>
            <tbody>';
        
        // Iterate through the rows of the result set
        while ($row = $result->fetch_assoc()) {
            echo '<tr>
                <td>' . $row['patient_name'] . '</td>

                <td>' . $row['specialist'] . '</td>
                <td>' . $row['Symptoms'] . '</td>
                
            </tr>';
        }
        
        // Close the table
        echo '</tbody></table>';
    } else {
        echo "No data found for the specified specialist.";
    }
    
    // Close the prepared statement
    $stmt->close();
} else {
    echo "Error: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
