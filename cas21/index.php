<?php 
    include 'db.php';

    // pretraga
    $where_arr = [];
    $where_arr[] = " 1=1 ";
    if( isset($_GET['first_name']) && $_GET['first_name'] != "" ){
        $first_name = strtolower($_GET['first_name']);
        $where_arr[] = " lower(first_name) LIKE '%$first_name%' ";
    }
    if( isset($_GET['last_name']) && $_GET['last_name'] != "" ){
        $last_name = strtolower($_GET['last_name']);
        $where_arr[] = " lower(last_name) LIKE '%$last_name%' ";
    }
    if( isset($_GET['phone1']) && $_GET['phone1'] != "" ){
        $phone1 = strtolower($_GET['phone1']);
        $where_arr[] = " lower(phone1) LIKE '%$phone1%' ";
    }
    if( isset($_GET['phone2']) && $_GET['phone2'] != "" ){
        $phone2 = strtolower($_GET['phone2']);
        $where_arr[] = " lower(phone2) LIKE '%$phone2%' ";
    }
    if( isset($_GET['address']) && $_GET['address'] != "" ){
        $address = strtolower($_GET['address']);
        $where_arr[] = " lower(address) LIKE '%$address%' ";
    }
    if( isset($_GET['email']) && $_GET['email'] != "" ){
        $email = strtolower($_GET['email']);
        $where_arr[] = " lower(email) LIKE '%$email%' ";
    }
    
    $where_str = implode("AND", $where_arr );

    $sql = "SELECT * FROM contacts WHERE $where_str ORDER BY first_name ASC";
    $res = mysqli_query($dbconn, $sql);
    $cnt = mysqli_num_rows($res);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phonebook</title>
</head>
<body>

    <a href="new_contact.php">Add new contact</a>
    <a href="new_city.php">Add new city</a>
    <hr>    
    <br>    

    <form action="./index.php" method="GET">

        <input type="text" name="first_name" placeholder="First name">
        <input type="text" name="last_name" placeholder="Last name">
        <input type="text" name="phone1" placeholder="Phone 1">
        <input type="text" name="phone2" placeholder="Phone 2">
        <input type="text" name="address" placeholder="Address">
        <input type="text" name="email" placeholder="Email">

        <button>SEARCH</button>

    </form>
    <br>
    <br>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Phone 1</th>
                <th>Phone 2</th>
                <th>Address</th>
                <th>Email</th>
                <th>Details</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                while( $row = mysqli_fetch_assoc($res) ){
                    $id_temp = $row['id'];
                    $link1 = "<a href=\"contact.php?id=$id_temp\" >details</a>";
                    $link2 = "<a href=\"delete_contact.php?id=$id_temp\" >delete</a>";
                    $link3 = "<a href=\"edit_contact.php?id=$id_temp\" >edit</a>";
                    echo "<tr>";
                    echo  "    <td>".$id_temp."</td>";
                    echo  "    <td>".$row['first_name']."</td>";
                    echo  "    <td>".$row['last_name']."</td>";
                    echo  "    <td>".$row['phone1']."</td>";
                    echo  "    <td>".$row['phone2']."</td>";
                    echo  "    <td>".$row['address']."</td>";
                    echo  "    <td>".$row['email']."</td>";
                    echo  "    <td>".$link1."</td>";
                    echo  "    <td>".$link2."</td>";
                    echo  "    <td>".$link3."</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>

    <p>Total: <?=$cnt?></p>
    
</body>
</html>