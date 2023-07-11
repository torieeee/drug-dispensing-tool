<?php
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

// Fetch data from the database
$sql = "SELECT * FROM contracts";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Contracts</title>
    <style>
        table {
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
        }
    </style>
</head>
<body>

    <h2>Doctors</h2>
    <table>
        <tr>
            <th>Supervisor</th>
            <th>start date</th>
            <th>end_date</th>
            <th>text of contract</th>
<th>Pharmacy</th>
<th>Company</th>

        </tr>
        <?php
        // Iterate over each row of data and display it in the table
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["supervisor"] . "</td>";
                echo "<td>" . $row["start_date"] . "</td>";
                echo "<td>" . $row["end_date"] . "</td>";
                echo "<td>" . $row["text_written"] . "</td>";
                echo "<td>" . $row["Pharmacy"] . "</td>";
                echo "<td>" . $row["Company"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No data found</td></tr>";
        }
        ?>
    </table>

</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
