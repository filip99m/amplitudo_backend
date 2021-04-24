<?php 
    include 'db.php';
    include 'functions.php';

    isset($_GET['id']) && is_numeric($_GET['id']) ? $id = $_GET['id'] : exit("ID error...");

    checkAuth();
    // prijavljeni smo
    $user = $_SESSION['user'];
    $user_id = $user['id'];

    $sql = "SELECT * FROM contacts WHERE id = $id  AND user_id = $user_id";
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
    <title>Edit contact</title>
</head>
<body>
    
    <form action="./edit_contact_back.php" method="POST" enctype="multipart/form-data">
        <?php // echo $contact['first_name']; ?>
        <input type="hidden" name="id" value="<?=$id?>" >
        <input type="text" name="first_name" placeholder="First name" value="<?=$contact['first_name']?>" >
        <input type="text" name="last_name" placeholder="Last name" value="<?=$contact['last_name']?>" >
        <input type="text" name="phone1" placeholder="Phone 1" value="<?=$contact['phone1']?>" >
        <input type="text" name="phone2" placeholder="Phone 2" value="<?=$contact['phone2']?>">
        <input type="text" name="address" placeholder="Address" value="<?=$contact['address']?>">
        <input type="text" name="email" placeholder="Email" value="<?=$contact['email']?>">

        <select name="city_id" id="" required>
            <option value="">-choose city-</option>
            <?php 
                $res = mysqli_query($dbconn, "SELECT * FROM cities ORDER BY name ASC");
                $city_id = $contact['city_id'];
                while($row = mysqli_fetch_assoc($res)){
                    $id_temp = $row['id'];
                    $name_temp = $row['name'];

                    $selected = "";
                    if($city_id == $id_temp){
                        $selected = "selected";
                    }

                    echo "<option value=\"$id_temp\" $selected >$name_temp</option>";
                }
            ?>
        </select>

        <br>
        <br>
        <img src="<?=$profile_image?>" alt="" width="300" >
        <br>
        <label for="profile_image">odaberite novu sliku</label>
        <input type="file" name="profile_image" id="profile_image">
        <br>
        <br>

        <button>UPDATE</button>

    </form>

</body>
</html>