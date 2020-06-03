<!-- /doctors/singledoctorlookup.php
Author: Gavin Lu
Student Number: 250672690

This php-code takes a given license number and prints
all the doctor's information. This code assumes that
a license number is always valid, and is up to the
selection process to handle those cases.
-->


<?php

    //Get the doctor from the database.
    $doctorLicense= $_POST["licensenumber"];
    $query = 'SELECT * FROM doctor, hospital WHERE doctor.licensenumber = "' . $doctorLicense . '" AND doctor.hospitalcode = hospital.code';
    $result=mysqli_query($connection,$query);
    if (!$result) {
        die("database query2 failed.");
    }

    //Collect and print doctor data from the result
    $row=mysqli_fetch_assoc($result);
    echo '<h3>', ' Dr. ', $row["firstname"], " ", $row["lastname"], "'s Information: </h3><br>";
    echo "Hospital: ", $row["name"], ' (', $row["city"], ', ', $row["province"], ')<br>';
    echo "Specialty: ", $row["specialty"], '<br>';
    echo "License Number: ", $row["licensenumber"], '<br>';
    echo "Date Licensed: ", $row["licensedate"], '<br>';
    
    mysqli_free_result($result);
?>
