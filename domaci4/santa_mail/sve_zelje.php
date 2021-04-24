<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
    <link rel="stylesheet" href="style3.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Wishes</title>

    <!-- Ikonica za title bar -->
    <link rel="icon" type="image/png" href="../icon/2.png">
    
</head>
<body>

    <div class="container my-4">
        <div>
            <h1 class="text-center" style="color: dark; background-color: rgba(245, 245, 220, 0.541)">List of all wishes</h1>
        </div>
        <table class="table table-hover table-light">
            <thead>
                <tr>
                <th scope="col">Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">City</th>
                <th scope="col">Good/Bad</th>
                <th scope="col">Wish</th>
                </tr>
            </thead>
            <tbody>

                <?php

//Prikaz zelja
                    $folder = "../zelje_db";
                    $array = scandir($folder);
                    foreach ($array as $file) {
                        if ($file == "." || $file == "..") continue;
                        $my_file = fopen($folder . "/" . $file, "r") or die("404");
                        $table = fread($my_file, filesize($folder . "/" . $file));
                        $arr = json_decode($table, true);
                        fclose($my_file);
                        echo "<tr>";
                        foreach ($arr as $a) {
                            echo "<td>$a</td>";
                        }
                        echo "</tr>";
                    }

                ?>

            </tbody>
        </table>
    </div>
    



    <!-- JS za JQuery i Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>