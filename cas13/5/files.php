<?php

    $db_folder = 'db';

    function insertIntoDB($table, $value){
        global $db_folder;
        if(!file_exists($db_folder)){
            mkdir($db_folder);
        }
        $h = fopen($db_folder . '/' . $table . '.txt', 'a+');
        fwrite($h, $value);
        fclose($h);
    }

    
    function readFromDb($table, $key = null){
        global $db_folder;
        if(!file_exists($db_folder . '/' . $table . '.txt')){
            $e = new Exception('Ne postoji fajl', 222);
            throw $e;
        }
    };


    // $new_folder = 'uploads/'.date('d_m_Y');

    // if(!file_exists($new_folder)){
    //     mkdir($new_folder);
    // }

    // $h = fopen($new_folder . '/drugi.txt', 'a+'); //a+,a,w
    // fwrite($h, "Prvi upis u TXT fajl...");
    // fclose($h);

?>