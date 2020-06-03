<!-- /doctors/printdoctors.php
Author: Gavin Lu
Student Number: 50672690

This page-fragment prints a list of doctors given
an order provided by the user.
-->

<h2>Doctors registered with the Association:</h2>
<ol>

<!-- Form for selecting a doctor from the list to perform
a service, such as look-up or deletion.
-->
<form action="" method="post">
<?php

  //Collect form information about sort order
  $sortBy= $_POST["sortby"];
  $sortOrder= $_POST["order"];

  //Gather doctor data from database
  $query = 'SELECT firstname, lastname, licensenumber FROM doctor ORDER BY ' . $sortBy . ' ' . $sortOrder;
  $result=mysqli_query($connection,$query);
  if (!$result) {
    die("database query2 failed.");
  }

  //Print each doctor's information
  //This also attaches a radio button to each doctor
  //to allow them to be selected for a later service.
  while ($row=mysqli_fetch_assoc($result)) {
    echo '<input type="radio" name="licensenumber" value="', $row["licensenumber"], '" checked>';
    echo $row["firstname"], ' ', $row["lastname"], '<br>';
  }
  mysqli_free_result($result);
?>
</ol>

<!-- Once a list of doctors is available, provide a service
for the selected doctor. In this case, either look up or delete
the doctor.
 -->
<input type="submit" value="Look up Doctor" name="lookup">(Q1b)<br>
<input type="submit" value="Delete Doctor" name="delete">(Q4)
</form>
