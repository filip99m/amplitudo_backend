<?php 
    include 'db.php';

    isset($_GET['id']) && is_numeric($_GET['id']) ? $id = $_GET['id'] : exit("ID error...");

    $sql = "SELECT * FROM contacts WHERE id = $id ";
    $res = mysqli_query($dbconn, $sql);
    $cnt = mysqli_num_rows($res);

    if($cnt == 0){
        exit("No contact with this ID...");
    }
    // citamo detalje o kontaktu
    $contact = mysqli_fetch_assoc($res);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit contact</title>
</head>
<body>
    
    <form action="./edit_contact_back.php" method="POST">
        <?php // echo $contact['first_name']; ?>
        <input type="hidden" name="id" value="<?=$id?>" >
        <input type="text" name="first_name" placeholder="First name" value="<?=$contact['first_name']?>" >
        <input type="text" name="last_name" placeholder="Last name" value="<?=$contact['last_name']?>" >
        <input type="text" name="phone1" placeholder="Phone 1" value="<?=$contact['phone1']?>" >
        <input type="text" name="phone2" placeholder="Phone 2" value="<?=$contact['phone2']?>">
        <input type="text" name="address" placeholder="Address" value="<?=$contact['address']?>">
        <input type="text" name="email" placeholder="Email" value="<?=$contact['email']?>">

        <button>UPDATE</button>

    </form>

</body>
</html>