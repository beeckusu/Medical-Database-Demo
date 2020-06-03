<!-- /doctors/index.php
Author: Gavin Lu
Student Number: 250672690

This page acts as the page that manages all doctor-related
functions.
-->

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Canadian Medical Database: Doctors</title>
</head>
<body>

<h1>Welcome to the Canadian Medical Database: Doctors</h1>
<a href="../index.php">Return to Main Page</a>
<?php
  include '../connectdb.php';

  //Include the modules of this page
  //These two modules (addnewdoctor and deletedoctor)
  //come first so that database lookups are accurate.
  include 'addnewdoctor.php';
  if(isset($_POST['delete'])){
    include 'deletedoctor.php';
  }
  echo '<p><hr><p>';
  include 'doctorlookup.php';
  if(isset($_POST['lookup'])){
    include 'singledoctorlookup.php';
  }
  echo '<p><hr><p>';
  include 'filterdoctorsbylicense.php';

  mysqli_close($connection);
?>

</body>
</html>
