<!-- /doctors/selectdoctor.php
Author: Gavin Lu
Student Number: 250672690

Simple php code that gets the list of doctors and provides
radio buttons to allow for selection. Must be used inside of
a form since this code does not provide a form, only input
fields.

The value of the doctor's radio button is their licensenumber.
-->

<?php
	
        //Get doctor information from the database
	$query = 'SELECT * FROM doctor';
	$result=mysqli_query($connection,$query);
	if (!$result) {
		die("Database query failed - could not fetch doctors.");
	}

        //Print every doctor and provide a radio button for each.
	while ($row=mysqli_fetch_assoc($result)) {
		echo '<input type="radio" name="licensenumber" value="', $row["licensenumber"], '">', $row["firstname"], ' ', $row["lastname"], '<br>';
	}

	mysqli_free_result($result);

?>
