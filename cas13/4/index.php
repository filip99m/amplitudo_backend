<?php

    include 'users.php';

    $d1 = strtotime('29.12.2020');
    $d2 = strtotime('28.12.2020');

    $response_array = ['datum_danas' => $d2, 'datum_sjutra' => $d1];

    // echo json_encode($response_array);

    $json_string = "{\"datum_danas\":1609110000,\"datum_sjutra\":1609196400}";
    $response_array = json_decode($json_string, true);
    // var_dump($response_array->datum_danas);
    // var_dump($response_array['datum_danas']);
    
    // REST
    echo(json_encode($users));

?>