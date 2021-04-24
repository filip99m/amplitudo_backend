<?php

    $todos = json_decode(file_get_contents('../db/todo.db'), true);

    if (isset($_POST['index']) && is_numeric($_POST['index'])) {
        $index = $_POST['index'];
    } else {
        exit("Greska 1 - index");
    }

    unset($todos[$index]);
    $todos = array_values($todos);

    if (file_put_contents('../db/todo.db', json_encode($todos))) {
        exit("OK");
    } else {
        exit("Greska pri upisu");
    }

?>