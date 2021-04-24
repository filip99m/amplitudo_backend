<?php

    $todos = json_decode(file_get_contents('db/todo.db'), true);

    function noviID(){
        global $todos;
        $max = 0;
        foreach($todos as $todo){
            if($todo['id'] > $max) $max = $todo['id'];
        }return $max+1;
    }

    function nadjiZadatak($id){
        global $todos;
        foreach((array)$todos as $key => $todo){
            if(intval($todo['id']) == intval($id)) return $key;
        }return false;
    }


?>