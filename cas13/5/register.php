<?php

    require 'files.php';

    try{
        readFromDb('cars');
    }catch(Exception $e){
        echo $e -> getMessage();
    }

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        isset($_POST['ime']) && $_POST['ime'] != '' ? $ime = $_POST['ime']: $ime = 'Nepoznato';
        isset($_POST['prezime']) && $_POST['prezime'] != '' ? $prezime = $_POST['prezime']: $prezime = 'Nepoznato';
        isset($_POST['username']) && $_POST['username'] != '' ? $username = $_POST['username']: $username = 'Nepoznato';
        isset($_POST['password']) && $_POST['password'] != '' ? $password = $_POST['password']: $password = 'Nepoznato';

        //VALIDACIJA
        // pravimo niz
        $new_user = [
            'ime' => $ime,
            'prezime' => $prezime,
            'username' => $username,
            'password' => $password,
            'datum_registracije' => date('d.m.Y H:i')
        ];
        $json_new_user = json_encode($new_user);

        insertIntoDB('users', $json_new_user);
        exit("Uspjesna registracija...");


    }else{
        $e = new Exception('Nepravilan metod!', 222);
        // echo $e -> getCode();
        //throw $e;
    }

?>