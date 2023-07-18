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
$resultsPerPage = 10; // Number of results to display per page
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // Get the current page number

// Calculate the starting row for the query
$startFrom = ($currentPage - 1) * $resultsPerPage;


// Fetch data from the database
$sql = "SELECT * FROM doctor LIMIT $startFrom,$resultsPerPage";
$result = $conn->query($sql);
// Count the total number of rows
$totalRows = $result->num_rows;

// Calculate the total number of pages
$totalPages = ceil($totalRows / $resultsPerPage);


?>

<!DOCTYPE html>
<html>
<head>
    <title>Doctors available</title>
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
            <th>Name</th>
            <th>Email</th>
            <th>Specilaity</th>
<th>Years of experience</th>

        </tr>
        <?php
        // Iterate over each row of data and display it in the table
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["SSN"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["speciality"] . "</td>";
                echo "<td>" . $row["yoe"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No data found</td></tr>";
        }
        ?>
    </table>
    <!-- Pagination links -->
    <?php if ($totalPages > 1) : ?>
        <div class="pagination-container">
            <ul class="pagination">
                <?php if ($currentPage > 1) : ?>
                    <li><a href="?page=<?php echo $currentPage - 1; ?>">Previous</a></li>
                <?php endif; ?>

                <?php for ($page = 1; $page <= $totalPages; $page++) : ?>
                    <li <?php echo ($page == $currentPage) ? 'class="active"' : ''; ?>>
                        <a href="?page=<?php echo $page; ?>"><?php echo $page; ?></a>
                    </li>
                <?php endfor; ?>

                <?php if ($currentPage < $totalPages) : ?>
                    <li><a href="?page=<?php echo $currentPage + 1;

     ?>">Next</a></li>
<?php endif; ?>
</ul>
</div>
<?php endif; ?>





</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
