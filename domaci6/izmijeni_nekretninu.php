<?php 
    include 'db.php';

    isset($_GET['id']) && is_numeric($_GET['id']) ? $id = $_GET['id'] : exit("ID Greska...");

    $sql = "SELECT * FROM nekretnine WHERE id = $id";
    $res = mysqli_query($dbconn, $sql);
    $cnt = mysqli_num_rows($res);

    if($cnt == 0){
        exit("Nema nekretnine sa ovim ID-em...");
    }

    $nekretnina = mysqli_fetch_assoc($res);

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Izmijeni</title>
</head>
<body>

    
    <div class="nav justify-content-center mb-2 mt-3">
        <ul class="nav nav-pills justify-content-center">
            <li class="nav-item">
                <a class="nav-link active" href="index.php">Nekretnine</a>
            </li>
        </ul>
    </div>

    <div class="container text-center">
            <div class="col">
                    <form action="dodaj_novu_izmjenu.php" class="form" method="POST">
                        <input class="form-control" type="hidden" name="id" value="<?=$id?>">
                        <table class="table table-hover">
                            <tr>
                                <td colspan="2">
                                    <select class="form-control" name="nekretnina_id" required>
                                    <option value="">-odaberite grad-</option>
<?php
                                            $res = mysqli_query($dbconn, "SELECT * FROM tip_nekretnine ORDER BY naziv_nekretnine ASC");
                                            $nekretnina_id = $nekretnina['nekretnina_id'];
                                            while($row = mysqli_fetch_assoc($res)){
                                                $id_temp = $row['id'];
                                                $naziv_temp = $row['naziv_nekretnine'];
                                                $izabrano = "";
                                                if($nekretnina_id == $id_temp){
                                                    $izabrano = "selected";
                                                }

                                                echo "<option value=\"$id_temp\" $izabrano >$naziv_temp</option>";
                                            }

?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <select class="form-control" name="oglas_id" required>
                                        <option value="">-odaberite grad-</option>
<?php
                                            $res = mysqli_query($dbconn, "SELECT * FROM tip_oglasa ORDER BY naziv_oglasa ASC");
                                            $oglas_id = $nekretnina['oglas_id'];
                                            while($row = mysqli_fetch_assoc($res)){
                                                $id_temp = $row['id'];
                                                $naziv_temp = $row['naziv_oglasa'];
                                                $izabrano = "";
                                                if($oglas_id == $id_temp){
                                                    $izabrano = "selected";
                                                }

                                                echo "<option value=\"$id_temp\" $izabrano >$naziv_temp</option>";
                                            }
?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <select class="form-control" name="grad_id" required>
                                        <option value="">-odaberite grad-</option>
<?php
                                            $res = mysqli_query($dbconn, "SELECT * FROM grad ORDER BY naziv_grada ASC");
                                            $grad_id = $nekretnina['grad_id'];
                                            while($row = mysqli_fetch_assoc($res)){
                                                $id_temp = $row['id'];
                                                $naziv_temp = $row['naziv_grada'];
                                                $izabrano = "";
                                                if($grad_id == $id_temp){
                                                    $izabrano = "selected";
                                                }

                                                echo "<option value=\"$id_temp\" $izabrano >$naziv_temp</option>";
                                            }

?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <label class="boldovano" for="povrsina">Povrsina:</label>
                                    <input class="form-control" type="number" name="povrsina" placeholder="Unesi povrsinu" value="<?=$nekretnina['povrsina']?>">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <label class="boldovano" for="cijena">Cijena:</label>
                                    <input class="form-control" type="number" name="cijena" placeholder="Unesi cijenu" value="<?=$nekretnina['cijena']?>">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <label class="boldovano" for="godina_izgradnje">Godina izgradnje:</label>
                                    <input class="form-control" type="number" name="godina_izgradnje" placeholder="Unesi godinu izgradnje" value="<?=$nekretnina['godina_izgradnje']?>">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <label class="boldovano" for="opis">Opis:</label>
                                    <input class="form-control" type="text" name="opis" placeholder="Unesi opis" value="<?=$nekretnina['opis']?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="status">Prodato</label>
                                    <input class="form-control" type="text" name="status" value="Dostupno" placeholder="Dostupno/Prodato"> 
                                </td>
                                <td colspan="2">
                                    <label class="boldovano" for="datum_prodaje">Datum prodaje:</label>
                                    <input class="form-control" type="date" name="datum_prodaje" placeholder="Unesi datum prodaje" value="<?=$nekretnina['datum_prodaje']?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <button class="btn btn-primary btn-block my-3">IZMIJENI</button>
                    </form>
                                </td>
                                <td style="float: left;">
                                    <a href="index.php"><button data-dismiss class="btn btn-danger my-3"><i class="fa fa-times"></i></button></a>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    
                                </td>
                            </tr>
                        </table>
                        
                
            </div>
    </div>


    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>