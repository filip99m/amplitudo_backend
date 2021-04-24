<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New contact</title>
</head>
<body>
    
    <form action="./add_new_contact.php" method="POST" enctype="multipart/form-data" >

        <input type="text" name="first_name" placeholder="First name">
        <input type="text" name="last_name" placeholder="Last name">
        <input type="text" name="phone1" placeholder="Phone 1">
        <input type="text" name="phone2" placeholder="Phone 2">
        <input type="text" name="address" placeholder="Address">
        <input type="text" name="email" placeholder="Email">

        <select name="city_id" id="" required>
            <option value="">-choose city-</option>
            <?php 
                $res = mysqli_query($dbconn, "SELECT * FROM cities ORDER BY name ASC");
                while($row = mysqli_fetch_assoc($res)){
                    $id_temp = $row['id'];
                    $name_temp = $row['name'];
                    echo "<option value=\"$id_temp\" >$name_temp</option>";
                }
            ?>
        </select>
        
        <br>
        <br>
        <input type="file" name="profile_image">
        
        <br>
        <br>
        <button>SAVE</button>

    </form>

</body>
</html>