<!-- /patients/gettreatingdoctors.php
Author: Gavin Lu
Student Number: 250672690

This module is responsible for eliciting the user for a patient
OHIP to look up the patient's attending doctors. Afterwards, the
user is able to add another attending doctor to the patient or
delete one listed.
-->


<h2>Look up Patient's Attending Doctors</h2>
Enter a patient's OHIP number to list all doctors treating them. (Q7)<br>
Once the doctors are listed, you can assign a new doctor to or delete a treating doctor from the patient. (Q8)<br>
<br>
Patient OHIP:

<!-- Create form to look-up treating doctors given user
inputed patient OHIP. -->
<form action="" method="post">
    <input type="number" required pattern="[0-9]{9}" name="patientohip">
    <input type="submit" name='patientdoctors' value="Get Attending Doctors">
</form>


<?php
  //Check if user submitted request to get doctors treating a
  //given patient.
  if (isset($_POST['patientdoctors'])) {

    $patientohip = $_POST["patientohip"];

    //Get patient information from the database
    $query = 'SELECT firstname, lastname FROM patient WHERE ohipnumber = ' . $patientohip;
    $result=mysqli_query($connection,$query);
    if (!$result) {
         die("Database query failed - no patient found in the database with the given OHIP number.");
    }
    $patient = mysqli_fetch_assoc($result);

    //Check if the patient exists; that is, a patient has the
    //OHIP number given by the user. 
    if($patient) {

      echo '<h2>Doctors treating ', $patient["firstname"], ' ', $patient["lastname"], '</h2>';
      echo 'OHIP: ', $patientohip, '<br>';

      //Include these request-handling modules
      //These modules only handle user requests and print
      //the results.
      //These modules need to be included early so that later
      //on, the data fetched from the database is accurate.
      include 'addtreatingdoctor.php';
      include 'deletetreatingdoctor.php';

      //Get doctor information that treats patient
      $query = 'SELECT firstname, lastname, licensenumber FROM doctor, treats WHERE ' . $patientohip . ' = treats.patientohip AND treats.doctorlicense = doctor.licensenumber';
      $result=mysqli_query($connection,$query);

      //Create table that holds the treating doctors
      echo '<table>';
        echo '<tr>';
         echo '<th>', 'First Name', '</th>';
         echo '<th>', 'Last Name', '</th>';
        echo '</tr>';

      //Create a form which will be used to take a selected
      //treating doctor and delete them if selected.
      echo '<form action="" method="post">';

      //Print doctors that can also be selected
      while ($row=mysqli_fetch_assoc($result)) {
        echo '<tr>';
          echo '<th><input type="radio" name="doctorlicense" value="', $row["licensenumber"], '" required checked>', $row["firstname"], '</th>';
          echo '<th>', $row["lastname"], '</th>';
        echo '</tr>';
      }
      echo '</table>';
 
      //Include information from the currently submitted form
      //that will be sent to the 'deletetreatingdoctor' form.
      echo '<input type="hidden" name="patientdoctors">';
      echo '<input type="hidden" name="patientohip" value=', $patientohip, '>';
      echo '<input type="submit" name="deletetreatingdoctor" value="Remove"><br>';
      echo '</form>';
      mysqli_free_result($result);


      //This section allows users to optionally assign a new
      //doctor to a patient.
      echo '<h2>Assign Doctor to Patient</h2>';

      //Create form to select a doctor to add to the selected
      //patient. 
      echo '<form action="" method="post">';
        echo '<input type="hidden" name="patientdoctors">';
        echo '<input type="hidden" name="patientohip" value=', $patientohip, '>';
        include '../doctors/selectdoctor.php';
        echo '<input type="submit" name="addtreatingdoctor" value="Add Doctor">';
      echo '</form>';

    } else {
      echo 'Patient was not found.';
    }
  }

?>
