<!-- /doctors/filterdoctorsbylicense.php
Author: Gavin Lu
Student Number: 250672690

This page-fragment takes user date input and then fetchs
from the database all doctors licensed before the given date.
-->

<h2>Filter Doctors by License Date (Q2)</h2>

<!-- Create the form to get filter date. -->
<form action="" method="post">
  Select doctors licensed prior to:
  <input type="date" name="date" value="2020-01-01" required><br>
  <input type="submit" name="filterlicense" value="Get Doctors">
</form>


<?php	
  //Check if the form above has been sent.
  if (isset($_POST[filterlicense])){

    //Get the date submitted by the user
    $date= $_POST["date"];

    //Fetch from database doctors whose licensedate < user-specified date
    echo '<h3>Doctors Licensed Prior to ', $date, ': </h3>';
    $query = 'SELECT * FROM doctor WHERE licensedate < "' . $date . '"';
    $result=mysqli_query($connection,$query);
    if (!$result) {
      die("database query2 failed.");
    }

    //Create a table and populate the table with all
    //fetched doctors.
    echo ' <table>';
      echo '<tr>';
        echo '<th>First Name</th>';
        echo '<th>Last Name</th>';
        echo '<th>License Number</th>';
        echo '<th>Date Licensed</th>';
        echo '<th>Specialty</th>';
      echo '</tr>';
      while ($row=mysqli_fetch_assoc($result)) {
        echo '<tr>';
          echo '<td>', $row["firstname"], '</td>';
          echo '<td>', $row["lastname"], '</td>';
          echo '<td>', $row["licensenumber"], '</td>';
          echo '<td>', $row["licensedate"], '</td>';
          echo '<td>', $row["specialty"], '</td>';
        echo '</tr>';
      }
    echo '</table>';
    mysqli_free_result($result);
  }
?>
