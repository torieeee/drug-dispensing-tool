<?php 
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<link rel="stylesheet" href="../../CSS/pages.css">

<body>

  <!--here is the maincontainer holding our elements-->

  <div class="maincontainer">

    <!--the navigation elements are stored here in this div box-->
    <div class="navbar">
      <h3>Welcome, <?php echo $_SESSION["userVar"]; ?></h3>
      <div class="navbtn">
        <button class="togglebtn" onclick="logOut()">Log Out</button>
        <button class="togglebtn" onclick="toggle('mainPage',this)" id="defaultDisplay">Welcome Page!</button>
        <button class="togglebtn" onclick="toggle('settings',this)">account settings</button>
        <button class="togglebtn" onclick="toggle('doctorManagement',this)">Doctor Management</button>
      </div>
    </div>

  <!--where the content is stored-->
  <div class="content">
  <!--here is where the shifters are stored-->



      <div class="contentForms" id="mainPage">
          <!--content for the pages-->
          <div class="content1">
            <p>welcome to your user account! here are the features you can perform as a Doctor
            </p>
            <ul>
              <li>view Symptoms</li>
              <li>add Prescription</li>
              <li>update account information</li>
              <li>log out</li>
            </ul>
      
            <h1>FAQs</h1>
            <p>the most commonly asked qns include:</p>
            <ul>
              <li>how to delete the account</li>
              <li>example 1</li>
              <li>example 2</li>
              <li>example 3</li>
            </ul>
          </div>
          
      </div>

      <!--settings form-->
      <div class="contentForms" id="settings">
      <h1>User Settings</h1>

      <!--this is the level 2 toggle settings-->
      <div class="level2togglebtns">
        <button class="innertogglebutton"  id="defaultDisplay" onclick="innertoggle('updateDoctorProperties',this,'black')">Update Account Details</button>
        <button class="innertogglebutton" class="negBtn" onclick="innertoggle('deleteDoctorAccount',this,'red')">Request deletion</button>
      </div>

      <!--level 2 content containers-->
      <div class="innertogglecontent" id="updateDoctorProperties">
        <form>
          <input type="text" name="name" id="name" placeholder="name"> <br><br>
          <input type="text" name="email" id="email" placeholder="email"><br><br>
          <input type="text" name="ssn" id="ssn" placeholder="ssn"><br><br>
          <input type="text" name="speciality" id="speciality" placeholder="speciality"><br><br>
          <input type="text" name="yoe" id="yoe" placeholder="Y.O.E"><br><br>
          <input type="text" name="password" id="pass" placeholder="password"><br><br>
          <button type="submit"  name="submit" id="submit">Update</button>
        </form>
      </div>

      <!--here is where deletion of account occurs-->
      <div class="innertogglecontent" id="deleteDoctorAccount" >
        <form action="PHP/Users/deleteUser.php" method="post">
          <h3>input your password, we will confirm pending deletion of your account in 28 days</h3>
          <input type="password" name="password" placeholder="password"><br><br>
          <input type="submit" value="Request Deletion" class="negBtn" id="btnDeletionUser">
        </form>
      </div>
    </div>

    <!--next content form-->
    <div class="contentForms" id="doctorManagement">
      <div class="level2togglebtns">
        <button class="innertogglebutton"  id="defaultDisplay" onclick="innertoggle('updateDoctorForm',this,'green')">post prescription</button>
        <button class="innertogglebutton"  id="defaultDisplay" onclick="innertoggle('viewDoctorPrescription',this,'green')">view symptoms</button>
      </div>
      
      <!-- form to update the doctor's symptoms details-->
        <div class="innertogglecontent" id="updateDoctorForm">
          <form action="../Doctors/prescriptionAddition.php" method="POST">
            <input type="text" name="prescriptionID" placeholder="prescriptionID" hidden><br><br>
            <input type="text" name="doctorName" value="<?php echo $_SESSION["userVar"];?>" readonly><br><br>
            <textarea placeholder="Description of Prescription" name="doctorPrescription"></textarea><br><br>
            <button type="submit" name="submit">add prescription</button><br><br>
          </form>
        </div>

        <!-- table to view the doctor's symptoms details-->
        <div class="innertogglecontent" id="viewDoctorPrescription">
          
            <!--here table will be automatically updated with php and echoed here-->
            <?php

              include_once("C:/xampp/htdocs/drug System/PHP/connectorclass.php");


              $sql = "SELECT PatientName, PatientSymptoms FROM `symptomdetails`";
              $result = $conn->query($sql);
              if ($result -> num_rows > 0){
                echo "<table>";
                echo "<tr><th>PatientName</th><th>Symptoms</th></tr>"; 
                while($row = $result->fetch_assoc()){       
                  echo "<tr><td>".($row['PatientName'])."</td><td>".($row['PatientSymptoms'])."</td></tr>";
                }
              echo "</table>";
              }
                
                else{
                  echo "0 rows are present";
                }



            ?>
          
        </div>
      

    </div>
  
  
    </div>

    <!--where the footer is located-->
    <div class="footer">
      <h5>drug company co</h5>
      <h6>all rights reserved</h6>
      <h6>2023</h6>
    </div>

  </div>
  
</body>

  <script src="../../JS/toggleUnified.js"></script>
  <script src="../../JS/innertoggleUnified.js"></script>
  <script src="../../JS/redirections.js"></script>
  

</html>

