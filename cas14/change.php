<?php

    include 'function.php';

    if(isset($_GET['id']) && $_GET['id'] != ""){
        $id = $_GET['id'];
    }else{
        exit("Greska 1 - nepravilan id...");
    }

    if(nadjiZadatak($id) !== FALSE){
        $index = nadjiZadatak($id);
        $zadatak = $todos[$index];
    }else{
        exit('Ne postoji zadatak sa predatim ID-em');
    }

    $tekst = $zadatak['tekst'];
    $opis = $zadatak['opis'];
    $zavrsen = $zadatak['zavrsen'];

    if($zavrsen) $checked = "checked";
    else $checked = "";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Izmjena zadatka</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
</head>
</head>
<body>
    
    <div class="container">
        <form action="modification.php" method="POST">

        <div class="row mt-5">
            <div class="col-6 offset-4">
                <input type="text" class="form-control" value="<?php echo $tekst; ?>" name="tekst">
                <input type="hidden" value="<?=$id?>" name="id">
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-6 offset-4">
                <textarea type="text" class="form-control" rows="6" name="opis"><?=$opis?></textarea>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-6 offset-4">
                <label>
                    <input type="checkbox" name="zavrsen" <?=$checked?>> Zadatak zavrsen
                </label>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-6 offset-4">
                <button class="btn btn-success btn-block">Izmjena</button>
            </div>
        </div>
        </form>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="./app.js"></script>
</body>
</html>