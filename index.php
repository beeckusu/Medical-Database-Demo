<!-- /index.php
Author: Gavin Lu
Student Number: 250672690

This page represents the main page of the website.
On it, the user has the option to visit the three
other main pages that contain functions updating 
the doctor, hospital, or treats table.
 -->

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Canadian Medical Database</title>
</head>
<body>

<h1>Welcome to the Canadian Medical Database</h1>
<h2>Select a Category</h2>



<h3>Doctors</h3>
Doctor-related functions available in this section include:
<ul>
  <li>List all doctors in specified order (Q1a)</li>
  <li>Look-up individual doctor's information (Q1b)</li>
  <li>List doctors licensed prior to a specified date (Q2)</li>
  <li>Add a new doctor to the database (Q3)</li>
  <li>Delete a doctor from the database (Q4)</li>
</ul>
<form action="doctors/index.php" method="post">
  <input type="submit" value="Doctors">
</form>


<p>
<hr>
<p>


<h3>Hospitals</h3>
Hospital-related functions available in this section include:
<ul>
  <li>Update an existing hospital's name (Q5)</li>
  <li>List all hospital names and their respective Head Doctors (Q6)</li>
</ul>

<form action="hospitals/index.php" method="post">
  <input type="submit" value="Hospitals">
</form>


<p>
<hr>
<p>


<h3>Patients</h3>
Patient-related functions available in this section include:
<ul>
  <li>Look-up doctors treating a specified patient (Q7)</li>
  <li>Assign a specified doctor to a specified patient (Q8a)</li>
  <li>Unassign a doctor treating a patient (Q8b)</li>
  <li>Look-up doctors without patients (Q9)</li>
</ul>

<form action="patients/index.php" method="post">
  <input type="submit" value="Patients">
</form>
</body>
</html>
