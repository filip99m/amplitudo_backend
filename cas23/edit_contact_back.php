<?php 

    include 'db.php';
    include 'functions.php';

    // var_dump($_FILES);
    // exit();

    isset($_POST['id']) && is_numeric($_POST['id']) ? $id = $_POST['id'] : exit("ID error...");

    isset($_POST['first_name']) ? $first_name = $_POST['first_name'] : $first_name = "Nepoznato";
    isset($_POST['last_name']) ? $last_name = $_POST['last_name'] : $last_name = "Nepoznato";
    isset($_POST['phone1']) ? $phone1 = $_POST['phone1'] : $phone1 = "Nepoznato";
    isset($_POST['phone2']) ? $phone2 = $_POST['phone2'] : $phone2 = "";
    isset($_POST['address']) ? $address = $_POST['address'] : $address = "";
    isset($_POST['email']) ? $email = $_POST['email'] : $email = "";
    isset($_POST['city_id']) && is_numeric($_POST['city_id']) ? $city_id = $_POST['city_id'] : $city_id = "Null";

    if(isset($_FILES['profile_image']) && $_FILES['profile_image']['tmp_name'] != "" ){
        $new_file_name = uploadPhoto('profile_image');
        $update_photo = " ,profile_image = '$new_file_name' ";
        // brisati staru...
        $old_photo = mysqli_fetch_row(mysqli_query($dbconn, "SELECT profile_image FROM contacts WHERE id = $id"))[0];
        unlink($old_photo);
    }else{
        $update_photo = "";
    }

    // upit za dodavanje u bazu
    $sql_update = "
                    UPDATE contacts SET 
                                    first_name = '$first_name',
                                    last_name = '$last_name',
                                    phone1 = '$phone1',
                                    phone2 = '$phone2',
                                    address = '$address',
                                    email = '$email',
                                    city_id = $city_id
                                    $update_photo
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