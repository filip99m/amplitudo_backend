<?php

    header('Access-Control-Allow-Origin: *');
    $drzave = [
        ['id' => 1, 'naziv' => 'Crna Gora'],
        ['id' => 2, 'naziv' => 'Srbija'],
        ['id' => 3, 'naziv' => 'Hrvatska'],
        ['id' => 4, 'naziv' => 'BiH'],
        ['id' => 5, 'naziv' => 'Makedonija']
    ];

    sleep(5);
    echo json_encode($drzave[rand(0,count($drzave)-1)]);

?>