<?php

    include 'data.php';

    // $a = 10;
    // $b =5;

    // echo $a + $b;
    // echo $a." ".$b;

    // for($i = 0; $i < 10; $i++){
    //     echo "<h3> korak $i </h3>";
    // }

    // $j=0;
    // while($j < 10){
    //     if($j % 2 == 0){
    //         echo "<h3> korak $j </h3>";
    //     }
    //     $j++;
    // }

    // $gradovi = [
    //     'Budva', 
    //     'Podgorica', 
    //     'Bar'
    // ];

    // var_dump($gradovi);
    // print_r($gradovi);

    // for($i=0; $i<count($gradovi); $i++){
    //     echo "<p>.$gradovi[$i]</p>";
    // }


    // var_dump($drzave);

    $drzave = drzave();
    foreach($drzave as $drzava){
        echo "<p>".$drzava['naziv']."</p>";
    }


?>