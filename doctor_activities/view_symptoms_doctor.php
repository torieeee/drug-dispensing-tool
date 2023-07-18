<?php

session_start();
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
$SSN=$_SESSION['SSN'];
// Fetch data from the database

        $sql = "SELECT * FROM symptom ";
$stmt=$conn->prepare($sql);
if($stmt){
  
  $stmt->execute();
  $result=$stmt->get_result();
}


      
        
    




?>

<table>
  <tr>
    <th>Symptoms no</th>
    <th>Specilaist required</th>
    <th>Patient id</th>
    <th>Symptoms</th>
    <th> prescribe</th>
  </tr>
  <?php

      if (isset($result) && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . $row["symptoms_no"] . "</td>";
      echo "<td>" . $row["specialist"] . "</td>";
      echo "<td>" . $row["patient_ssn"] . "</td>";
      echo "<td>" . $row["symptoms"] . "</td>";

      echo "<td><a href='prescription.html?patient_id=" . $row["patient_ssn"] . "'>Prescribe Medication</a></td>";
      if (isset($_SESSION['patient_id'])) {
        $patientId = $_SESSION['patient_id'];
        echo "<td><a href='prescription.html?patient_id=" . $patientId . "'>Prescribe Medication</a></td>";
      } else {
        echo "<td>N/A</td>";
      }
      echo "</tr>";
      
    }
  } else {
    echo "<tr><td colspan='3'>No data found</td></tr>";
  }
  
  ?>
</table>

<?php
// Close the database connection
$conn->close();
?>
