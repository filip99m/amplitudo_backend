<?php

    include 'function.php';

    if(isset($_POST['tekst']) && $_POST['tekst'] != ""){
        $tekst = $_POST['tekst'];
    }else{
        exit("Greska 1 - morate unijeti tekst...");
    }

    if(isset($_POST['opis']) && $_POST['opis'] != ""){
        $opis = $_POST['opis'];
    }else{
        exit("Greska 2 - morate unijeti opis...");
    }

    $data = file_get_contents('db/todo.db');
    $data_arr = json_decode($data, true);
    if($data == null){
        $data_arr = [];
    }

    $data_arr[] = [
        'id' => noviID(),
        'tekst' => $tekst,
        'opis' => $opis,
        'zavrsen' => false
    ];

    if(file_put_contents('db/todo.db', json_encode($data_arr))){
        header('location: ./index.php?msg=1');
    } else{
        header('location: ./index.php?msg=0');
    }


    



?>