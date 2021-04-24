<?php 

    include 'db.php';

    isset($_POST['first_name']) ? $first_name = $_POST['first_name'] : $first_name = "Nepoznato";
    isset($_POST['last_name']) ? $last_name = $_POST['last_name'] : $last_name = "Nepoznato";
    isset($_POST['phone1']) ? $phone1 = $_POST['phone1'] : $phone1 = "Nepoznato";
    isset($_POST['phone2']) ? $phone2 = $_POST['phone2'] : $phone2 = "";
    isset($_POST['address']) ? $address = $_POST['address'] : $address = "";
    isset($_POST['email']) ? $email = $_POST['email'] : $email = "";

    // upit za dodavanje u bazu
    $sql_insert = "INSERT INTO contacts 
                                (
                                    first_name,
                                    last_name,
                                    phone1,
                                    phone2,
                                    address,
                                    email
                                ) 
                            VALUES
                                (
                                    '$first_name',
                                    '$last_name',
                                    '$phone1',
                                    '$phone2',
                                    '$address',
                                    '$email'
                                )
                ";
    $res_insert = mysqli_query($dbconn, $sql_insert);
    
    if($res_insert){
        header("location: index.php?msg=contact_added");
    }else{
        // exit("<pre>".$sql_insert."</pre>");
        header("location: index.php?msg=error");
        // exit("Greska pri dodavanju...");
    }
?>