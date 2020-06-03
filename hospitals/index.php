<!-- /hospitals/index.php
Author: Gavin Lu
Student Number: 250672690

This is the page for the hospital section of the website.
-->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Canadian Medical Database: Hospitals</title>
  </head>

  <body>

    <h1>Welcome to the Canadian Medical Database: Hospitals</h1>
    <a href="../index.php">Return to Main Page</a><br>

    <?php
      //Include hospital modules into the page
      include '../connectdb.php';
      include 'updatehospitalname.php';
      echo '<p><hr><p>';
      include 'gethospitalheads.php';

      mysqli_close($connection);
    ?>

  </body>
</html>
