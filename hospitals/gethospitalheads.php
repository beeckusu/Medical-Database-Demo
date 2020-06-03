<!-- /hospitals/gethospitalheads.php
Author: Gavin Lu
Student Number: 250672690

This php-code handles printing the head doctors for each
hospital. (Q6)
-->

<h2>Hospital Head Doctors (Q6)</h2>

<!-- Create a table to neatly organize the
information to be printed.-->
<table>
    <tr>
        <th>Hospital Name</th>
        <th>Head Doctor</th>
        <th>Date Started</th>
    </tr>

    <?php
        //Fetch head doctors from the database
        $query = 'SELECT name, firstname, lastname, dateheadstarted FROM doctor, hospital WHERE hospital.headlicense = doctor.licensenumber ORDER BY name';
        $result=mysqli_query($connection,$query);
        if (!$result) {
            die("Database query failed - cannot fetch hospitals and doctors.");
        }

        //Print head doctor information
        while ($row=mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>', $row["name"], '</td>';
            echo '<td>', $row["firstname"], ' ', $row["lastname"], '</td>';
            echo '<td>', $row["dateheadstarted"], '</td>';
            echo '</tr>';
        }

        mysqli_free_result($result);
    ?>

</table>
