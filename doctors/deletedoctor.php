<!-- /doctors/deletedoctor.php
Author: Gavin Lu
Student Number: 250672690

This page-fragment handles deleting a doctor from the
database given a license number from a form.
-->

<?php
  echo '<h2>Deleting a Doctor from the Database</h2>';

  $licensenumber= $_POST["licensenumber"];

  //First query: Check if there is a doctor with the
  //given license number.
  $query = 'SELECT * FROM doctor WHERE licensenumber = "' . $licensenumber . '"';
  $result=mysqli_query($connection,$query);
  if (!$result) {
    die("Deleting Doctor query failed.");
  }
  $row=mysqli_fetch_assoc($result);

  //If the query returned no rows, then there is no doctor
  //with the given license. Take no action.
  if (mysqli_num_rows($result) == 0) {
    echo 'Invalid license given - no doctor with that license. <br>';
  }
  //Else, a doctor exists and an action may need to be taken.
  else {

    //Check if the doctor is currently treating any patients
    $query = 'SELECT * FROM treats WHERE doctorlicense = "' . $licensenumber . '"';
    $result = mysqli_query($connection,$query);

    //If the doctor is treating a patient, then we need to warn
    //the user about a possible cascade deletion. Also check if
    //the user has already specified they want a cascade deletion.
    if (mysqli_num_rows($result) != 0 && !isset($_POST["cascade"])) {

      echo '<p><font color="red">This doctor is currently treating patients. Deleting this doctor means this doctor no longer treats these patients. Are you sure?</font></p>';

      //Create confirm button that resends the deletion information,
      //but also marks that a cascade deletion is desired.
      echo '<form action="" method="post">';

      echo '<input type="hidden" name="delete">';
      echo '<input type="hidden" name="licensenumber" value="', $licensenumber, '">';
      echo '<input type="submit" name="cascade" value="Continue">';

      echo '</form>';
    }

    //Else, delete the doctor because they either have no patients
    //or the user has specified they want a cascade deletion.
    else {
      
      $query = 'DELETE FROM doctor WHERE licensenumber = "' . $licensenumber . '"';
      mysqli_query($connection,$query);

      echo 'Dr. ', $row["firstname"], " ", $row["lastname"], ' has been deleted from the database.';
    }
    
  }  


?>
