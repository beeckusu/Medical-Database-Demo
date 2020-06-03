<!-- /patients/getpatientlessdoctors.php
Author: Gavin Lu
Student Number: 250672690

This module fetchs all doctors in the database that do not
treat any patients and prints the doctors in an organized
table.
-->

<h2>Patientless Doctors</h2>
Here are the doctors that do not have any patients: (Q9)<br>
<?php

    //Fetch doctors that are not found in the treats table
    $query = 'SELECT firstname, lastname FROM doctor WHERE licensenumber NOT IN (SELECT doctorlicense FROM treats)';
    $result=mysqli_query($connection,$query);
    if (!$result) {
        die("Database query failed - cannot find patientless doctors.");
    }


    //Creat the table to hold doctor information
    echo '<table>';

    //Print the column headers
    echo '<tr>';
      echo '<th>First Name</th>';
      echo '<th>Last Name</th>';
    echo '</tr>';

    //Print each doctor's name into a row
    while ($row=mysqli_fetch_assoc($result)) {
      echo '<tr>';
        echo '<td>', $row["firstname"], '</td>';
        echo '<td>', $row["lastname"], '</td>';
      echo '</tr>';
    }

    echo '<table>';

    mysqli_free_result($result);
?>
