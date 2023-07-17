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
$sql1="SELECT specialization from doctors where SSN=?";
$stmt1=$conn->prepare($sql1);
if($stmt1){
    $stmt1->bind-param("s",$SSN);
    $stmt1->execute();
    $result1=$stmt1->get_result();
    if ($result1->num_rows > 0){
      $row = $result1->fetch_assoc();
        $specialist=$stmt->get_result();
        $sql = "SELECT * FROM symptoms WHERE specialist=?";
$stmt=$conn->prepare($sql);
if($stmt){
  $stmt->bind_param("s",$row['specialization']);
  $stmt->execute();
  $result=$stmt->get_result();
}


      }
        
    }




?>

<table>
  <tr>
    <th>Symptoms no</th>
    <th>Patient id</th>
    <th>Symptoms</th>
  </tr>
  <?php

      if (isset($result) && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . $row["patient_ssn"] . "</td>";
      echo "<td>" . $row["patient_name"] . "</td>";
      echo "<td><a href='prescription.html?patient_id=" . $row["patient_id"] . "'>Prescribe Medication</a></td>";
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
