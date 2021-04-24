<?php 
    include '../db.php';

    isset($_GET['id']) && is_numeric($_GET['id']) ? $id = $_GET['id'] : exit("ID Greska...");

    $sql = "SELECT * FROM tip_nekretnine WHERE id = $id";
    $res = mysqli_query($dbconn, $sql);
    $cnt = mysqli_num_rows($res);

    if($cnt == 0){
        exit("Nema grada sa ovim ID-em...");
    }

    $tip_nekretnine = mysqli_fetch_assoc($res);

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Izmijeni</title>
</head>
<body>

    <div class="nav justify-content-center mb-5 mt-3">
        <ul class="nav nav-pills justify-content-center">
            <li class="nav-item">
                <a class="nav-link active" href="index.php">Nekretnina</a>
            </li>
        </ul>
    </div>


    <div class="text-center row mt-5">
            <div class="col-4"></div>
            <div class="col-4">
                <h3>Izmijeni</h3>
                <form action="dodaj_novu_izmjenu_nekretnine.php" method="POST" class="form">
                    <input class="form-control" type="hidden" name="id" value="<?=$id?>">
                    <input class="form-control" type="text" name="naziv_nekretnine" placeholder="Unesi nekretninu" value="<?=$tip_nekretnine['naziv_nekretnine']?>">
                    <button class="btn btn-primary btn-block my-3">IZMIJENI</button>
                </form>
                <a href="index.php"><button data-dismiss class="btn btn-danger btn-block my-3"><i class="fa fa-times"></i></button></a>
            </div>
    </div>

    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

</body>
</html>