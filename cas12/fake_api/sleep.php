<?php

    header('Access-Control-Allow-Origin: *');
    isset($_GET['seconds']) ? $seconds = $_GET['seconds']: $seconds =3;
    sleep($seconds);
    exit("Cekao sam $seconds sekundi....");

?>