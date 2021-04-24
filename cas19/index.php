<?php

    include "db.php ";

    // upit
    $upit = "SELECT * FROM radnik";
    $rezultat = mysqli_query($dbconn, $upit);
    // echo mysqli_num_rows($rezultat);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Ime</th>
                <th>Prezime</th>
                <th>Detalji</th>
            </tr>
        </thead>
        
        <?php

            while($red = mysqli_fetch_assoc($rezultat)){
                $temp_id = $red['id'];
                echo "<tr>";
                    echo "<td>" . $red['id'] . "</td>";
                    echo "<td>" . $red['ime'] . "</td>";
                    echo "<td>" . $red['prezime'] . "</td>";
                    echo "<td><a href=\"employee.php?id=$temp_id\">Detalji</a></td>";
                echo "</tr>";
            }

        ?>
    </table>
    <br/>

    <a href="./new_employee.php">Novi radnik</a>

</body>
</html>