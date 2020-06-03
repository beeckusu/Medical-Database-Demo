<!-- /hospitals/selecthospital.php
Author: Gavin Lu
Student Number: 250672690

This php-code provides a hospital input to a form.
-->

<?php
   //Fetch hospitals from database
   $query = "SELECT * FROM hospital";
   $result = mysqli_query($connection,$query);
   if (!$result) {
        die("databases query failed.");
    }

   //Print all hospitals and provide a radio
   //button to allow for selection.
   while ($row = mysqli_fetch_assoc($result)) {
        echo '<input type="radio" name="hospitalcode" value="', $row["code"], '" checked required>', $row["name"], ' (', $row["city"], ', ', $row["province"], ')<br>';
   }
   mysqli_free_result($result);
?>
