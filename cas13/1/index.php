<?php

    // $a = 10;
    // $arr = [];

    //integer, string, float, double, array, object, null
    //var_dump($a);

    //echo "Vrijednost: $a";

// funkcija za rad sa stringovima
    // echo strrev("Marko");
    // var_dump(expm1(" ", "marko jankovic"));
    // var_dump(implode(" ", ['marko', 'jankovic']));
    // var_dump(substr("marko markovic", 6));

// funkcija za rad sa brojevima
    // var_dump(is_numeric("10.5"));
    // var_dump(intval("10"));
    // var_dump(floatval("10"));
    // var_dump(min(10,11,9,22)); //max
    // var_dump(rand(10,100)); 
    // +,-,*,/,**
    // &&, ??, !
    // (cond) ? ..... : .....;
    // $str. - ";"

// if uslov
    // if(true){

    // }elseif(1==1){

    // }else{

    // };

// petlje
    // for($i=0; $i < 10; $i++)
    // while(1==2){

    // }
    // do{

    // }while(1==1);

    // $arr = ['test1','test2', 10]
    // foreach($arr as $elem){
    //     var_dump($elem);
    //     echo "<br>"
    // }

//funkcije

        // function jePunoljetan($godine){
        //     return $godine >= 18;
        // };

        // var_dump(jePunoljetan(10));

        // function prikaziPoruku($poruka){
        //     echo "<h1>$poruka $a</h1>";
        //     return true;
        // };

        // function ink(&$x){
        //     $x++;
        //     return $x;
        // }

        // $b = 10;
        // var_dump(ink($b));
        // var_dump($b);

// nizovi

        // $arr = [4,1,4,7,9];
        // ksort($arr);
        // print_r($arr);

        // $assoc_arr = [
        //     'kluc1' => 10,
        //     'kljuc2' => 'abc';
        // ];

        // krsort($assoc_arr);
        // print_r($assoc_arr);

        // $arr_2d = [
        //     'niz1' => [10,12],
        //     'niz2' => [15,16]
        // ];

        // print_r($arr_2d);

        var_dump($_SERVER['REQUEST_METHOD']);


?>