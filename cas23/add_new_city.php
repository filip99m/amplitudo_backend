<?php 

    include 'db.php';

    isset($_POST['name']) ? $name = $_POST['name'] : exit("Greska 1 - morate unijeti ime...");

    // upit za dodavanje u bazu
    $sql_insert = "INSERT INTO cities (name) VALUES ('$name')";
    $res_insert = mysqli_query($dbconn, $sql_insert);
    
    if($res_insert){
        header("location: index.php?msg=city_added");
    }else{
        // exit("<pre>".$sql_insert."</pre>");
        header("location: index.php?msg=error");
        // exit("Greska pri dodavanju...");
    }
?>