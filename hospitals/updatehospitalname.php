<!-- /hospitals/updatehospitalname.php
Author: Gavin Lu
Student Number: 250672690

This module updates a hospital's name given the user
input of a hospital to be renamed and a name to be given.
-->

<h2>Update Hospital Name</h2>

<?php
  //Check if the form below for changing the hospital
  //name has already been provided. Want to do this first
  //so that the names in the printed list are updated.
  if (isset($_POST['updatehospital'])){

    $newhospitalname = $_POST['newhospitalname'];
    $hospitalcode = $_POST['hospitalcode'];

    //Fetch hospital from the database with the given hospital code
    $query = 'SELECT * FROM hospital WHERE code = "' . $hospitalcode . '"';
    $result=mysqli_query($connection,$query);
    if (!$result) {
      die("Database query failed - could not update hospital name.");
    }
    $hospital = mysqli_fetch_assoc($result);

    //Update the hospital's name in the database
    $query = 'UPDATE hospital SET name = "' . $newhospitalname . '" WHERE code = "' . $hospitalcode . '"';
    $result=mysqli_query($connection,$query);
    if (!$result) {
      die("Database query failed - could not update hospital name.");
    }
    
    //Print message to inform user
    echo $hospital['name'], ' (', $hospital['city'], ', ', $hospital['province'], ') ';
    echo 'has been successfully renamed to ';
    echo $newhospitalname, ' (', $hospital['city'], ', ', $hospital['province'], ').';

  }
?>

<form action='' method='post'>
  <?php
    include 'selecthospital.php';
  ?>
  Hospital Name: <input type="text" name="newhospitalname" required> <br>
  <input type="submit" name="updatehospital" value="Update Name">
</form>

