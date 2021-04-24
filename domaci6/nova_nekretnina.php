<?php
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">

<heameta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Document</title>
</head>

    <div class="naslov">
        <h2 class="text-center mt-5 mb-5"><i class="fa fa-file"></i> Nova nekretnina</h2>
    </div>

    <div class="container">
        <table class="table">
            <form action="dodaj_novu_nekretninu.php" method="POST" enctype="multipart/form-data">
                <tr>
                    <td class="boldovano">Odaberi grad:</td>
                    <td>
                        <select class="form-control" name="grad_id" require>
                            <option value="">-odaberite grad-</option>
<?php
                            $res = mysqli_query($dbconn, "SELECT * FROM grad ORDER BY naziv_grada ASC");
                            while ($row = mysqli_fetch_assoc($res)) {
                                $id_temp = $row['id'];
                                $naziv_temp = $row['naziv_grada'];
                                echo "<option value=\"$id_temp\">$naziv_temp</option>";
                            }

?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="boldovano">Odaberi oglas:</td>
                    <td>
                        <select class="form-control" name="oglas_id" require>
                            <option value="">-odaberite tip oglasa-</option>
<?php
                                $res = mysqli_query($dbconn, "SELECT * FROM tip_oglasa ORDER BY naziv_oglasa ASC");
                                while ($row = mysqli_fetch_assoc($res)) {
                                    $id_temp = $row['id'];
                                    $naziv_temp = $row['naziv_oglasa'];
                                    echo "<option value=\"$id_temp\">$naziv_temp</option>";
                                }

?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="boldovano">Odaberi nekretninu:</td>
                    <td>
                        <select class="form-control" name="nekretnina_id" require>
                            <option value="">-odaberite tip nekretnine-</option>
<?php
                                $res = mysqli_query($dbconn, "SELECT * FROM tip_nekretnine ORDER BY naziv_nekretnine ASC");
                                while ($row = mysqli_fetch_assoc($res)) {
                                    $id_temp = $row['id'];
                                    $naziv_temp = $row['naziv_nekretnine'];
                                    echo "<option value=\"$id_temp\">$naziv_temp</option>";
                                }

?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="boldovano">Povrsina:</td>
                    <td>
                        <input class="form-control" type="number" name="povrsina" placeholder="Unesi povrsinu">
                    </td>
                </tr>
                <tr>
                    <td class="boldovano">Cijena:</td>
                    <td>
                        <input class="form-control" type="number" name="cijena" placeholder="Unesi cijenu">
                    </td>
                </tr>
                <tr>
                    <td class="boldovano">Godina izgradnje:</td>
                    <td>
                        <input class="form-control" type="number" name="godina_izgradnje" placeholder="Unesi godinu izgradnje">
                        
                    </td>
                </tr>
                <tr>
                    <td class="boldovano">Opis:</td>
                    <td>
                        <input class="form-control" type="text" name="opis" placeholder="Unesi opis">
                </tr>
                <tr>
                    <td class="boldovano">Izaberi sliku:</td>
                    <td>
                        <input type="file" required name="fotografija[]" multiple>  
                    </td>
                </tr>
                <tr>
                    <td>
                        <button class="btn btn-primary btn-block">SACUVAJ</button>
                        
                    </td>
                    <td>
                        <a href="index.php"><button type="button" data-dismiss class="btn btn-danger"><i class="fa fa-times"></i></button></a>
                    </td>
                </tr>
            </form>
        </table>
    </div>

    
        

    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>