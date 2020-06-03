<!-- /patients/index.php
Author: Gavin Lu
Student Number: 250672690

This page handles modules that modify the treats table
in the database.
-->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Canadian Medical Database: Patients</title>
  </head>
  <body>

    <h1>Welcome to the Canadian Medical Database: Patients</h1>
    <a href="../index.php">Return to Main Page</a><br>

    <?php
      include '../connectdb.php';

      //Include treats modules
      include 'gettreatingdoctors.php';
      echo '<p><hr><p>';
      include 'getpatientlessdoctors.php';

      mysqli_close($connection);
    ?>

  </body>
</html>
