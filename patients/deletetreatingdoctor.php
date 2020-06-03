<!-- /patients/deletetreatingdoctor.php
Author: Gavin Lu
Student Number: 250672690

This module handles requests for deleting treating doctors
from a specified patient.
-->


<?php
  //First, check if the user has sent a request to unassign
  //a doctor from a patient
  if (isset($_POST["deletetreatingdoctor"])){

    $patientohip= $_POST["patientohip"];
    $doctorlicense= $_POST["doctorlicense"];
    
    //Fetch patient information
    $query = 'SELECT firstname, lastname FROM patient WHERE ohipnumber = ' . $patientohip;
    $result=mysqli_query($connection,$query);
    if (!$result) {
         die("Database query - finding patient to delete treating doctor.");
    }
    $patient = mysqli_fetch_assoc($result);

    //Fetch doctor informaton
    $query = 'SELECT firstname, lastname FROM doctor WHERE licensenumber = "' . $doctorlicense . '"';
    $result=mysqli_query($connection,$query);
    if (!$result) {
         die("Database query failed - finding doctor to delete from treatindg patient.");
    }
    $doctor = mysqli_fetch_assoc($result);

    //Delete the patient-doctor relationship from the treats table
    $query = 'DELETE FROM treats WHERE doctorlicense = "' . $doctorlicense . '" AND patientohip = ' . $patientohip;
    $result=mysqli_query($connection,$query);
    if (!$result) {
         die("Database query failed - could not delete this association.");
    }

    //Notify user the change has occured
    echo 'Dr. ', $doctor["firstname"], ' ', $doctor["lastname"], ' no longer treats ', $patient["firstname"], ' ', $patient["lastname"], '.';    
  }
?>
