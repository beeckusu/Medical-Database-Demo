<!-- /doctors/addnewdoctor.php
Author: Gavin Lu
Student Number: 250672690

This page-fragment handles the module for adding a doctor
to the database (Q3).
-->

<h2>Add a Doctor to the Database (Q3)</h2>

<!--Create form to collect information about the new doctor-->
Enter doctor information:
<form action="" method="post">

  First Name:<br>
  <input type="text" name="newfirstname" required><br>
  Last Name: <br>
  <input type="text" name="newlastname" required><br>
  License Number: <br>
  <input type="text" name="newlicensenumber" value="AA00" required><br>
  Date Licensed: <br>
  <input type="date" name="newlicensedate" value="1900-01-01" required><br>
  Specialty:<br>
  <input type="text" name="newspecialty" required><br>
  Hospital:<br>

  <?php
    include '../hospitals/selecthospital.php';
  ?>

  <input type="submit" name="addnewdoctor" value="Add Doctor">
</form>

<!-- Once the information about the new doctor is submitted,
then add the doctor to the database. -->
<?php
  if(isset($_POST['addnewdoctor'])){
    //Collect doctor information from the form
    $firstname= $_POST["newfirstname"];
    $lastname= $_POST["newlastname"];
    $licensenumber= $_POST["newlicensenumber"];
    $licensedate= $_POST["newlicensedate"];
    $specialty= $_POST["newspecialty"];
    $hospitalcode= $_POST["hospitalcode"];

    //Before adding the doctor, check if the license number
    //belongs to an existing doctor.
    $query = 'SELECT licensenumber FROM doctor WHERE licensenumber = "' . $licensenumber . '"';
    $result=mysqli_query($connection,$query);
    if (!$result) {
      die("Database query failed - could not add doctor to the database.");
    }
    $row = mysqli_fetch_assoc($result);    
    
    //If a doctor was retrieved with the license number,
    //then take no action.
    if ($row) {
      echo 'Adding new doctor failed - a doctor already has that license number!';
    }
    //Else, add the doctor to the database.
    else {
      $query= 'INSERT INTO doctor (firstname, lastname, licensenumber, licensedate, specialty, hospitalcode) VALUES ("' . $firstname . '", "' . $lastname . '", "' . $licensenumber . '", "' . $licensedate . '", "' . $specialty . '", "' . $hospitalcode . '")';
      $result=mysqli_query($connection,$query);
      if (!$result) {
        die("Database query failed - could not add doctor to the database.");
      }
      echo 'Dr. ', $firstname, ' ', $lastname, ' has been successfully added.';
    }
  }
?>
