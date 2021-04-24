<?php

    if (!file_get_contents('../db/todo.db')) echo json_encode([]);
    else echo file_get_contents('../db/todo.db');

?>
