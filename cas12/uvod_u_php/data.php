<?php
    $drzave = [
        ['id' => 1, 'naziv' => 'Crna Gora'],
        ['id' => 2, 'naziv' => 'Srbija'],
        ['id' => 3, 'naziv' => 'Hrvatska'],
        ['id' => 4, 'naziv' => 'BiH'],
        ['id' => 5, 'naziv' => 'Makedonija']
    ];

    
    function drzave(){
        global $drzave;
        return $drzave;
    }
?>
