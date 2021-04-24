<?php

    session_start();

    // proc.
    $dbconn = mysqli_connect("localhost", "root", "", "phonebook");

    // oo
    $dsn = "mysql:host=localhost;dbname=phonebook";
    $user = "root";
    $pass = "";

    $pdo = new PDO($dsn, $user, $pass);

?>