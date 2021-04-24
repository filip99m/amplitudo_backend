<?php
include 'db.php';

$where_arr = [" 1 = 1 "];

if (isset($_GET['tip_nekretnine']) && $_GET['tip_nekretnine'] > "0") {
    $nekretnina_id = $_GET['tip_nekretnine'];
    $where_arr[] = " nek.nekretnina_id = $nekretnina_id ";
}
if (isset($_GET['tip_oglasa']) && $_GET['tip_oglasa'] > "0") {
    $oglas_id = $_GET['tip_oglasa'];
    $where_arr[] = " nek.oglas_id = $oglas_id ";
}
if (isset($_GET['grad']) && $_GET['grad'] > "0") {
    $grad_id = $_GET['grad'];
    $where_arr[] = " nek.grad_id = $grad_id ";
}
if (isset($_GET['povrsina']) && $_GET['povrsina'] != "") {
    $povrsina = $_GET['povrsina'];
    $where_arr[] = " povrsina > $povrsina ";
}
if (isset($_GET['cijenaod']) && $_GET['cijenaod'] != "") {
    $cijena1 = $_GET['cijenaod'];
    $where_arr[] = " cijena >= $cijena1 ";
}
if (isset($_GET['cijenado']) && $_GET['cijenado'] != "") {
    $cijena2 = $_GET['cijenado'];
    $where_arr[] = " cijena <= $cijena2 ";
}

$where_str = implode("AND", $where_arr);

$sql = "SELECT nek.id, nek.cijena, nek.povrsina, gr.naziv_grada, tip_n.naziv_nekretnine, tip_o.naziv_oglasa
            FROM nekretnine nek, grad gr, tip_nekretnine tip_n, tip_oglasa tip_o
            WHERE nek.grad_id=gr.id 
            AND nek.nekretnina_id=tip_n.id 
            AND nek.oglas_id=tip_o.id 
            AND $where_str 
            ORDER BY povrsina ASC";

$res = mysqli_query($dbconn, $sql);
$cnt = mysqli_num_rows($res);

$rez_grad = mysqli_query($dbconn, "SELECT * FROM grad");
$rez_oglasa = mysqli_query($dbconn, "SELECT * FROM tip_oglasa");
$rez_nekretnine = mysqli_query($dbconn, "SELECT * FROM tip_nekretnine");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>


    <div class="container center">

        <div style="background-color: #E8E8E8;" class="nav justify-content-center mb-5 mt-3">
            <ul class="nav nav-pills justify-content-center">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">Nekretnine</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="gradovi/index.php">Gradovi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tipovi_nekretnine/index.php">Tipovi nekretnine</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="nova_nekretnina.php">+ Dodaj nekretninu</a>
                </li>
            </ul>
        </div>


        <div class="pretraga mb-5">

            <form class="form" action="index.php" method="GET">
                <table class="table table-borderless text-center">
                    <tr class="boldovano">
                        <td>Nekretnine</td>
                        <td>Oglas</td>
                        <td>Grad</td>
                        <td>Povrsina</td>
                        <td colspan="2">Cijena</td>
                    </tr>
                    <tr>
                        <td>
                            <select name="tip_nekretnine" class="form-control">
                                <option value="-1">-izaberi nekretninu-</option>
                                <?php
                                while ($tip_nekretnine = mysqli_fetch_assoc($rez_nekretnine)) {
                                    $id = $tip_nekretnine['id'];
                                    $naziv = $tip_nekretnine['naziv_nekretnine'];
                                    echo "<option value='$id'>$naziv</option>";
                                }
                                ?>
                            </select>
                        </td>
                        <td>
                            <select name="tip_oglasa" class="form-control bold">
                                <option value="-1">-izaberi oglas-</option>
                                <?php
                                while ($tip_oglasa = mysqli_fetch_assoc($rez_oglasa)) {
                                    $id = $tip_oglasa['id'];
                                    $naziv = $tip_oglasa['naziv_oglasa'];
                                    echo "<option value='$id'>$naziv</option>";
                                }
                                ?>
                            </select>
                        </td>
                        <td>
                            <select name="grad" class="form-control">
                                <option value="-1">-izaberi grad-</option>
                                <?php
                                while ($grad = mysqli_fetch_assoc($rez_grad)) {
                                    $id = $grad['id'];
                                    $naziv = $grad['naziv_grada'];
                                    echo "<option value='$id'>$naziv</option>";
                                }
                                ?>
                            </select>
                        </td>
                        <td>
                            <input style="width: 100px" class="form-control" type="number" name="povrsina" placeholder="Veca od">
                        </td>
                        <td>
                            <input style="width: 80px" class="form-control" type="number" name="cijenaod" placeholder="od...">
                        </td>
                        <td>
                            <input style="width: 80px" class="form-control" type="number" name="cijenado" placeholder="do...">
                        </td>
                        <td>
                            <button class="btn btn-primary btn-block">PRETRAZI</button>
            </form>
            </td>
            <td>
                <a href="./index.php"><button class="btn btn-danger"><i class="fa fa-times"></i></button></a>
            </td>
            </tr>
            </table>

        </div>

        <div class="prikaz">

            <table class="table table-hover text-center">
                <thead>
                    <tr>
                        <th>Nekretnina</th>
                        <th>Oglas</th>
                        <th>Grad</th>
                        <th>Povrsina</th>
                        <th>Cijena</th>
                        <th>Detalji</th>
                        <th>Izbrisi</th>
                        <th>Izmijeni</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($red = mysqli_fetch_assoc($res)) {
                        $id_temp = $red['id'];
                        $link1 = "<a href=\"nekretnine.php?id=$id_temp\"><i class=\"fa fa-info\"></i></a>";
                        $link2 = "<a href=\"izbrisi_nekretninu.php?id=$id_temp\"><i class=\"fa fa-times\"></i></a>";
                        $link3 = "<a href=\"izmijeni_nekretninu.php?id=$id_temp\"><i class=\"fa fa-edit\"></i></a>";
                        echo "<tr>";
                        echo "<td class=\"font-weight-bold\">" . $red['naziv_nekretnine'] . "</td>";
                        echo "<td class=\"font-weight-bold\">" . $red['naziv_oglasa'] . "</td>";
                        echo "<td>" . $red['naziv_grada'] . "</td>";
                        echo "<td>" . $red['povrsina'] . " m<sup>2</sup>" . "</td>";
                        echo "<td>" . $red['cijena'] . " €" . "</td>";
                        echo "<td>" . $link1 . "</td>";
                        echo "<td>" . $link2 . "</td>";
                        echo "<td>" . $link3 . "</td>";
                        echo "</tr>";
                    }

                    ?>
                </tbody>
            </table>
            <p style="text-align:center">Ukupno: <?= $cnt ?></p>

        </div>

    </div>






    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>