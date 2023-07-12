<?php

// template code for table Looping (makes a table from the DB)


include_once("Database_connection");


              $sql = "SELECT fields FROM `tablename`";
              $result = $conn->query($sql);
              if ($result -> num_rows > 0){
                echo "<table>";
                echo "<tr><th>fieldHeading1</th><th>fieldHeading2</th></tr>"; /* --? more headings can be added, not limited to two */
                while($row = $result->fetch_assoc()){       
                  echo "<tr><td>".($row['fieldVal1'])."</td><td>".($row['fieldVal2'])."</td></tr>";
                }
              echo "</table>";
            }
                
                else{
                  echo "0 rows are present";
                }


/*

keys -> field vals -> these are fields in your table that you want to show on the table

-> database connection-> where your connections is

Self explanatory
-> fields
-> tablename


?>
