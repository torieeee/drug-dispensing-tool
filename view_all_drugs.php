<?php
$servername="localhost";
$username="root";
$password="";
$dbname="drug dispensing tool";
$conn=new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
    die("Connection failed".$conn->connect_error);
}
$sql = "SELECT * FROM drugs";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
<body><table>
    <tr><th>Drug no</th>
    <th> Drug name</th>
    <th>Drug formula</th>
    <th>Manufacturer</th></tr>
    <?php
        // Iterate over each row of data and display it in the table
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["drug_no"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["formula"] . "</td>";
                echo "<td>" . $row["company"] . "</td>";
                
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No data found</td></tr>";
        }
        ?>
</table>
    
</body>
</html>

>