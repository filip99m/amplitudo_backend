<?php 
    include 'db.php';

    isset($_GET['id']) && is_numeric($_GET['id']) ? $id = $_GET['id'] : exit("ID error...");

    $sql = "SELECT 
                contacts.*, 
                cities.name as city_name 
            FROM contacts 
            LEFT JOIN cities on contacts.city_id = cities.id 
            WHERE contacts.id = $id ";
    // exit($sql);
    $res = mysqli_query($dbconn, $sql);
    $cnt = mysqli_num_rows($res);

    if($cnt == 0){
        exit("No contact with this ID...");
    }

    // citamo detalje o kontaktu
    $contact = mysqli_fetch_assoc($res);

    if($contact['profile_image'] == "" || $contact['profile_image'] == null ){
        $profile_image = "./uploads/nophoto.png";
    }else{
        $profile_image = $contact['profile_image'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact details <?=$id?> </title>
</head>
<body>
    <p>First name: <?=$contact['first_name']?> </p>
    <p>Last name: <?=$contact['last_name']?> </p>
    <p>Phone 1: <?=$contact['phone1']?> </p>
    <p>Phone 2: <?=$contact['phone2']?> </p>
    <p>Address: <?=$contact['address']?> </p>
    <p>Email: <?=$contact['email']?> </p>
    <p>City: <?=$contact['city_name']?> </p>

    <img src="<?=$profile_image?>" alt="" width="300" >
</body>
</html>