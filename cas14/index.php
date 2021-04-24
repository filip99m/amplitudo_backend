<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TO-DO APP JS</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
</head>
<body>
    
    <div class="container">
        <h2 class="text-center mt-3" >TO-DO lista</h2>
        <div class="row">
            <div class="col-4 offset-4">
                <button class="btn btn-success btn-block mt-3" data-toggle="modal" data-target="#modal_dodavanje"> 
                    <i class="fa fa-plus"></i> 
                    Dodaj novi zadatak 
                </button>
            </div>
        </div>

        <div class="row mt-3">
                <?php
                    if(isset($_GET['msg']) && $_GET['msg'] == '1' ){
                        echo "<div class=\"col-12 alert alert-success text-center\">";
                        echo "Uspjesno dodavanje zadatka";
                        echo "</div>";
                    }else if(isset($_GET['msg']) && $_GET['msg'] == '0' ){
                        echo "<div class=\"col-12 alert alert-danger text-center\">";
                        echo "Neuspjesno dodavanje zadatka";
                        echo "</div>";
                    }else if(isset($_GET['msg']) && $_GET['msg'] == '2_1' ){
                        echo "<div class=\"col-12 alert alert-success text-center\">";
                        echo "Uspjesna izmjena";
                        echo "</div>";
                    }else if(isset($_GET['msg']) && $_GET['msg'] == '2_0' ){
                        echo "<div class=\"col-12 alert alert-danger text-center\">";
                        echo "Neuspjesna izmjena";
                        echo "</div>";
                    }else if(isset($_GET['msg']) && $_GET['msg'] == '3_1' ){
                        echo "<div class=\"col-12 alert alert-success text-center\">";
                        echo "Uspjesno brisanje";
                        echo "</div>";
                    }else if(isset($_GET['msg']) && $_GET['msg'] == '3_0' ){
                        echo "<div class=\"col-12 alert alert-danger text-center\">";
                        echo "Neuspjesno brisanje";
                        echo "</div>";
                    }
                ?>
        </div>

        <div class="row mt-5">
            <div class="col-12 table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tekst</th>
                            <th>Opis</th>
                            <!-- <th>Zavrseno</th> -->
                            <th>Izmjena</th>
                            <th>Brisanje</th>
                        </tr>
                    </thead>
                    <tbody id="tabela_svih_body" >

                        <?php

                            $todos = json_decode(file_get_contents('db/todo.db'), true);
                            foreach((array)$todos as $todo){
                                $id_temp = $todo['id'];
                                $zavrsen_temp = $todo['zavrsen'];

                                if($zavrsen_temp) $red_pozadina = "style =\"background-color: lightgreen;\"";
                                else $red_pozadina = "";

                                $link_izmjena = "<a href=\"change.php?id=$id_temp\" class=\"btn btn-primary btn-sm\"><i class=\"fa fa-edit\"></i></a>";
                                $link_brisanje = "<a href=\"delete.php?id=$id_temp\" class=\"btn btn-danger btn-sm\"><i class=\"fa fa-times\"></i></a>";
                                echo "<tr $red_pozadina>";
                                echo " <td>$id_temp</td>";
                                echo " <td>".$todo['tekst']."</td>";
                                echo " <td>".$todo['opis']."</td>";
                                //echo " <td></td>";
                                echo " <td>$link_izmjena</td>";
                                echo " <td>$link_brisanje</td>";
                                echo "</tr>";
                            }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>


<?php

    include 'modals/add.php';
    include 'modals/change.php';

?>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="./app.js"></script>
</body>
</html>