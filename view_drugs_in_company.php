<?php
include 'company_login.php';
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "drug dispensing tool";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);

}




$sql = "SELECT * FROM drugs WHERE company = ?";
$stmt = $conn->prepare($sql);
if ($stmt) {
    // Bind the company name to the prepared statement
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
                    <th>Drug Name</th>
                    <th>Company</th>
                    <th>Formula</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>';
        
        // Iterate through the rows of the result set
        while ($row = $result->fetch_assoc()) {
            echo '<tr>
                <td>' . $row['drug_name'] . '</td>

                <td>' . $row['company'] . '</td>
                <td>' . $row['Formula'] . '</td>
                <td>' . $row['price'] . '</td>
            </tr>';
        }
        
        // Close the table
        echo '</tbody></table>';
    } else {
        echo "No data found for the specified company.";
    }
    
    // Close the prepared statement
    $stmt->close();
} else {
    echo "Error: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
