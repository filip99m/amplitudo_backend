<?php 

    include 'db.php';

    isset($_POST['id']) && is_numeric($_POST['id']) ? $id = $_POST['id'] : exit("ID error...");

    isset($_POST['first_name']) ? $first_name = $_POST['first_name'] : $first_name = "Nepoznato";
    isset($_POST['last_name']) ? $last_name = $_POST['last_name'] : $last_name = "Nepoznato";
    isset($_POST['phone1']) ? $phone1 = $_POST['phone1'] : $phone1 = "Nepoznato";
    isset($_POST['phone2']) ? $phone2 = $_POST['phone2'] : $phone2 = "";
    isset($_POST['address']) ? $address = $_POST['address'] : $address = "";
    isset($_POST['email']) ? $email = $_POST['email'] : $email = "";

    // upit za dodavanje u bazu
    $sql_update = "
                    UPDATE contacts SET 
                                    first_name = '$first_name',
                                    last_name = '$last_name',
                                    phone1 = '$phone1',
                                    phone2 = '$phone2',
                                    address = '$address',
                                    email = '$email'
                    WHERE id = $id
                ";
    $res_update = mysqli_query($dbconn, $sql_update);
    
    if($res_update){
        header("location: index.php?msg=contact_updated");
    }else{
        // exit("<pre>".$sql_insert."</pre>");
        header("location: index.php?msg=contact_not_updated");
        // exit("Greska pri dodavanju...");
    }
?>