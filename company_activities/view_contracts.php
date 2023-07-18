<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname="drug dispensing tool";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}



$sql="SELECT * FROM contract";
$stmt=$conn->prepare($sql);
if($stmt){
    

    $stmt->execute();
    $result=$stmt->get_result();
    if ($result->num_rows > 0) {
        // Start building the HTML table
        echo '<table>
            <thead>
                <tr>
                    <th>pharmacy</th>
                    <th> start_date</th>
                    <th>end_date</th>
                    <th>terms</th>
                    <th>supervisor</th>
                    <th>drugs</th>
                    
                    
                </tr>
            </thead>
            <tbody>';
        
    
    // Iterate through the rows of the result set
    while ($row = $result->fetch_assoc()) {
        echo '<tr>
            <td>' . $row['pharmacy'] . '</td>

            <td>' . $row['start_date'] . '</td>
            <td>' . $row['end_date'] . '</td>
            <td>' . $row['terms'] . '</td>
            <td>' . $row['supervisor'] . '</td>
            <td>' . $row['drugs_delivered'] . '</td>
            <td>' . $row['company'] . '</td>
            
        </tr>';
    }
    
    // Close the table
    echo '</tbody></table>';
} else {
    echo "No data found .";
}

// Close the prepared statement
$stmt->close();
} else {
echo "Error: " . $conn->error;
}

// Close the database connection
$conn->close();
?>


