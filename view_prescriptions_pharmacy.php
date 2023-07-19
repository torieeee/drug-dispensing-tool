<?php
include 'database1.php';
session_start();
$pharmacy=$_SESSION['Name'];
$sql="SELECT * FROM prescription WHERE pharmacy_recommended=?";
$stmt=$conn->prepare($sql);
if($stmt){
    $stmt-> bind_param("s",$pharmacy);
$stmt->execute();
$result=$stmt->get_result();
if ($result->num_rows > 0) {
    
    echo '<table>
        <thead>
            <tr>
                <th>diagnosis</th>
                <th>patient ssn</th>
                <th>doctor_ssn</th>
                <th>drugs</th>
                <th>Prescription_no</th>
                <th>recommendations</th>
                <th>pharmacy</th>
                <th>sell</th>
            </tr>
        </thead>
        <tbody>';
    
    // Iterate through the rows of the result set
    while ($row = $result->fetch_assoc()) {
        echo '<tr>
            <td>' . $row['diagnosis'] . '</td>
<td>'.$row['patient_ssn'].'</td>
            <td>' . $row['doctor_ssn'] . '</td>
            <td>' . $row['drugs'] . '</td>
            <td>' . $row['prescription_no'] . '</td>
            <td>'.$row['recommendations'].'</td>
            <td>'.$row['pharmacy_recommended'].'</td>
            <td><a href="sell_drugs.html">sell</a></td>
            
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

?>