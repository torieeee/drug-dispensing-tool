<?php

//template code for population of drop down fields from the database


include_once("database_connection");
//fetch data from db
$sql = ' SELECT fields FROM  Tablename';
// query the sql with db connection           
$result = $conn -> query($sql);
//loop the result
while($row = $result->fetch_assoc()){
?>

<option  value="<?=$row["Value you want to go into database"];?>">
<?=$row['Value you want to show to the user'];?></option>
<?php
}
?>
</select><br><br>



?>
