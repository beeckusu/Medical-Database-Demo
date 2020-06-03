<!-- /patients/addtreatingdoctor.php
Author: Gavin Lu
Student Number: 250672690

This module handles form requests for assigned a doctor to treat
a patient.
-->

<?php
  //Check if an 'addtreatingdoctor' form has been submitted.
  if(isset($_POST["addtreatingdoctor"])){

    $patientohip= $_POST["patientohip"];
    $doctorlicense= $_POST["licensenumber"];
    
    //Get patient information from the database given the patient OHIP
    $query = 'SELECT firstname, lastname FROM patient WHERE ohipnumber = ' . $patientohip;
    $result=mysqli_query($connection,$query);
    if (!$result) {
         die("Database query failed - could not find the patient.");
    }
    $patient = mysqli_fetch_assoc($result);

    //Get doctor information from the database given the doctor licensenumber
    $query = 'SELECT firstname, lastname FROM doctor WHERE licensenumber = "' . $doctorlicense . '"';
    $result=mysqli_query($connection,$query);
    if (!$result) {
         die("Database query failed - could not find the doctor.");
    }
    $doctor = mysqli_fetch_assoc($result);

    //Check if this patient-doctor relationship already exists	
    $query = 'SELECT * FROM treats WHERE doctorlicense = "' . $doctorlicense . '" AND patientohip = ' . $patientohip;
    $result=mysqli_query($connection,$query);

    //If there is a row from the database result, then the
    //relationship already exists and no action should be taken
    if (mysqli_fetch_assoc($result)) {
	echo 'This doctor already treats this patient.<br>';
    }

    //Otherwise, the patient-doctor relationship can be created
    else {
      $query = 'INSERT INTO treats (doctorlicense, patientohip) VALUES ("' . $doctorlicense . '", ' . $patientohip . ')';
      $result=mysqli_query($connection,$query);
      if (!$result) {
        die("Database query failed - could not add this treating doctor.");
      }

      echo 'Dr. ', $doctor["firstname"], ' ', $doctor["lastname"], ' now treats ', $patient["firstname"], ' ', $patient["lastname"], '.';    

    }
  }
?>
    
