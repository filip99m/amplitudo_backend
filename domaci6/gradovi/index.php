<?php 
    include '../db.php';

    $where_arr = [];
    $where_arr[] = " 1=1 ";
    if( isset($_GET['naziv_grada']) && $_GET['naziv_grada'] != "" ){
        $naziv_grada = strtolower($_GET['naziv_grada']);
        $where_arr[] = " lower(naziv_grada) LIKE '%$naziv_grada%' ";
    }
    
    $where_str = implode("AND", $where_arr );

    $sql = "SELECT * FROM grad WHERE $where_str";
    $res = mysqli_query($dbconn, $sql);
    $cnt = mysqli_num_rows($res);


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Gradovi</title>
</head>
<body>

    <div class="container">
        <div style="background-color: #E8E8E8;" class="nav justify-content-center mb-5 mt-3">
            <ul class="nav nav-pills justify-content-center">
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">Nekretnine</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">Gradovi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../tipovi_nekretnine/index.php">Tipovi nekretnine</a>
                </li>
                <li class="nav-item">
                    <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">+ Dodaj novi grad</button>
                </li>
            </ul>
        </div>
    
    

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Dodaj grad</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="dodaj_novi_grad.php" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control" name="naziv_grada" placeholder="Unesi naziv" required>
                        </div>
                    
                </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Izađi</button>
                            <button class="btn btn-primary">Dodaj</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>

    <div class="text-center row mt-5">
            <div class="col-4"></div>
            <div class="col-4">
                <form action="index.php" method="GET" class="form">
                    <input class="form-control mb-3" type="text" name="naziv_grada" placeholder="Unesi naziv grada">
                    <button class="btn btn-primary">PRETRAGA</button>
                    <a href="index.php"><button type="button" class="btn btn-danger"><i class="fa fa-times"></i></button></a>
                </form>
            </div>
    </div>
    
    <div class="container">
        <div class="spisak text-center mt-5">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="text-left">Grad</th>
                        <th>Izbrisi</th>
                        <th>Izmijeni</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($red = mysqli_fetch_assoc($res)){
                            $id_temp = $red['id'];
                            $link1 = "<a href=\"izbrisi_grad.php?id=$id_temp\"><i class=\"fa fa-times\"></i></a>";
                            $link2 = "<a href=\"izmijeni_grad.php?id=$id_temp\"><i class=\"fa fa-edit\"></i></a>";
                            echo "<tr>";
                                echo "<td class=\"text-left\">".$red['naziv_grada']."</td>";
                                echo "<td>".$link1."</td>";
                                echo "<td>".$link2."</td>";
                            echo "</tr>";
                        }

                    ?>
                </tbody>
            </table>

            <p style="text-align: center;">Ukupno: <?=$cnt?></p>

        </div>



    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>