<?php

    header('Access-Control-Allow-Origin: *');
    $gradovi = [
        ['id' => 1, 'drzava_id' => 1, 'naziv' => 'Podgorica'],
        ['id' => 2, 'drzava_id' => 1,'naziv' => 'Budva'],
        ['id' => 3, 'drzava_id' => 1, 'naziv' => 'Kolasin'],
        ['id' => 4, 'drzava_id' => 2, 'naziv' => 'Beograd'],
        ['id' => 5, 'drzava_id' => 2, 'naziv' => 'Novi Sad'],
        ['id' => 6, 'drzava_id' => 3, 'naziv' => 'Zagreb'],
        ['id' => 7, 'drzava_id' => 3, 'naziv' => 'Dubrovnik'],
        ['id' => 8, 'drzava_id' => 4, 'naziv' => 'Sarajevo'],
        ['id' => 9, 'drzava_id' => 4, 'naziv' => 'Banja Luka'],
        ['id' => 10, 'drzava_id' => 4, 'naziv' => 'Visegrad'],
        ['id' => 11, 'drzava_id' => 5, 'naziv' => 'Skoplje'],
        ['id' => 12, 'drzava_id' => 5, 'naziv' => 'Krusevo'],
        ['id' => 13, 'drzava_id' => 5, 'naziv' => 'Kocani']
    ];

    $drzava_id = $_GET['drzava_id'];
    $res = [];
    foreach($gradovi as $key => $grad){
        if($grad['drzava_id'] == $drzava_id) $res[] = $grad;
    }
    echo json_encode($res);
?>