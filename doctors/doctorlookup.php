<!--
Author: Gavin Lu
Student Number: 250672690

This page-fragment handles users selecting the order they want
doctors to be listed before printing out a list.
-->

<h2>Doctor Lookup (Q1a)</h2>

<!-- Create form to take user input on what order they
want doctors to be listed in.
-->

Select the order to list doctors:
<form action="" method="post">
<table>
  <tr>
    <th>Order doctors by:</th>
  </tr>
  <tr>
    <td><input type="radio" name="sortby" value="firstname" checked>First Name</td>
    <td><input type="radio" name="sortby" value="lastname">Last Name</td>
  </tr>
  <tr>
    <th>Order names by:</th>
  </tr>
  <tr>
    <td><input type="radio" name="order" value="ASC" checked>Ascending</td>
    <td><input type="radio" name="order" value="DESC">Descending</td>
  </tr>
</table>
<input type="submit" name="listdoctors" value="Get Doctors">
</form>


<!-- If the form has been submitted, then print the list
of doctors.
-->
<?php
  if (isset($_POST["listdoctors"])) {
    include 'printdoctors.php';
  }
?>

