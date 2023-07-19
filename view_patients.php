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
$sql = "SELECT * FROM patient";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Registered patients</title>
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
            <th>SSN</th>
            <th>first name</th>
            <th>last name</th>
            <th>phone number</th>
            <th>address</th>
            

            <th>Email</th>
            


        </tr>
        <?php
        // Iterate over each row of data and display it in the table
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["SSN"] . "</td>";
                echo "<td>" . $row["first_name"] . "</td>";
                echo "<td>" . $row["last_name"] . "</td>";
                echo "<td>" . $row["phone_no"] . "</td>";
                echo "<td>" . $row["address"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                
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
