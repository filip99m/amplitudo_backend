<?php

// Provjera da li je POST metoda
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if(!isset($_POST['name']) || !isset($_POST['last_name']) || !(isset($_POST['city']) && $_POST['city'] != "") || !(isset($_POST['your_wish']) && $_POST['your_wish'] != "")){
            header('location: index.html?msg=error');
        }else{
            $name = $_POST['name'];
            $last_name = $_POST['last_name'];
            $city = $_POST['city'];
            $your_wish = $_POST['your_wish'];

            $name_temp = str_split($name);
            $last_name_temp = str_split($last_name);


// Provjere za unos
            foreach ($name_temp as $word) {
                if (('a' <= $word && $word <= 'z') || ('A' <= $word && $word <= 'Z')) {continue;}
                header('location: index.html?msg=error');
            }

            foreach ($last_name_temp as $word) {
                if (('a' <= $word && $word <= 'z') || ('A' <= $word && $word <= 'Z')) {continue;}
                header('location: index.html?msg=error');
            }
            
            if(isset($_POST['good_bad'])){
                $good = "Good";
            }else{
                $good = "Bad";
            } 

            save($name, $last_name, $city, $your_wish, $good);
            header('location: zelja_poslata.html');
        }
    }else{
        header('location: index.html');
    }

// Kreiranje fajla i unos podataka u njemu
    function save($name, $last_name, $city, $your_wish, $good){
        $folder = "zelje_db";

        if (!file_exists($folder)) {
            mkdir($folder);
        }
        $file_name = uniqid();

        $h = fopen($folder . "/" . $file_name . ".txt", "a+") or die("404");
        $array = [
            'name' => $name, 
            'last_name' => $last_name, 
            'city' => $city, 
            'good' => $good, 
            'your_wish' => $your_wish
        ];

// JSON
        $json_format = json_encode($array);
        fwrite($h, $json_format);
        fclose($h);
    }


?>