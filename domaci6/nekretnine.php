<?php 
    include 'db.php';

    isset($_GET['id']) && is_numeric($_GET['id']) ? $id = $_GET['id'] : exit("ID Greska...");

    $sql = "SELECT 
                nekretnine.*, 
                grad.naziv_grada as naziv_grada,
                tip_oglasa.naziv_oglasa as oglas,
                tip_nekretnine.naziv_nekretnine as nekretnina
            FROM nekretnine 
            LEFT JOIN grad on nekretnine.grad_id = grad.id 
            LEFT JOIN tip_oglasa on nekretnine.oglas_id = tip_oglasa.id
            LEFT JOIN tip_nekretnine on nekretnine.nekretnina_id = tip_nekretnine.id
            WHERE nekretnine.id = $id";

    $res = mysqli_query($dbconn, $sql);
    $cnt = mysqli_num_rows($res);


    if($cnt == 0){
        exit("Nema nekretnine sa ovim ID-em...");
    }

    $nekretnina = mysqli_fetch_assoc($res);

    $res = mysqli_query($dbconn, "SELECT slika FROM slike WHERE nekretnine_id = $id");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Detalji <?=$id?> </title>
</head>
<body>

        <div class="nav justify-content-center mb-5 mt-3">
            <ul class="nav nav-pills justify-content-center">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">Nekretnine</a>
                </li>
            </ul>
        </div>

    <div class="naslov">
        <h2 class="text-center mt-3 mb-3"><i class="fa fa-info"></i> Detalji</h2>
    </div>

    <div class="container">
        <table class="table table-border">
            <tr>
                <td rowspan="10">
                    
<?php

                    $i = 0;
                    while ($slika = mysqli_fetch_assoc($res)) {
                        $path = $slika['slika'];
                        $act = "";
                        if ($i == 0)
                            $act = "active";
                        echo "<div class='$act'>";
                        echo "  <img src='$path' width='500px' height='300px'>";
                        echo "</div>";
                        $i += 1;
                    }

?>
                </td>
            </tr>
            <tr>
                <td class="boldovano">Nekretnina:</td>
                <td><?=$nekretnina['nekretnina']?></td>
            </tr>
            <tr>
                <td class="boldovano">Oglas:</td>
                <td><?=$nekretnina['oglas']?></td>
            </tr>
            <tr>
                <td class="boldovano">Grad:</td>
                <td><?=$nekretnina['naziv_grada']?></td>
            </tr>
            <tr>
                <td class="boldovano">Povrsina:</td>
                <td><?=$nekretnina['povrsina']?> m<sup>2</sup></td>
            </tr>
            <tr>
                <td class="boldovano">Cijena:</td>
                <td><?=$nekretnina['cijena']?> €</td>
            </tr>
            <tr>
                <td class="boldovano">Godina izgradnje:</td>
                <td><?=$nekretnina['godina_izgradnje']?></td>
            </tr>
            <tr>
                <td class="boldovano">Opis:</td>
                <td><?=$nekretnina['opis']?></td>
            </tr>
            <tr>
                <td class="boldovano">Status:</td>
                <td><?=$nekretnina['status']?>     </td>
            </tr>
            <tr>
                <td class="boldovano">Datum prodaje:</td>
                <td><?=$nekretnina['datum_prodaje']?></td>
            </tr>
        </table>
    </div>


    



    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>


</body>
</html>
