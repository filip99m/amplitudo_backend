<?php 

    include './db.php';

    isset($_POST['email']) && $_POST['email'] != "" ? $email = $_POST['email'] : exit("ERR1");
    isset($_POST['password']) && $_POST['password'] != "" ? $password = $_POST['password'] : exit("ERR2");

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :e AND password = md5(:p) ");
    $stmt->bindParam(':e', $email, PDO::PARAM_STR);
    $stmt->bindParam(':p', $password, PDO::PARAM_STR);
    $stmt->execute();

    $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if(count($user) > 0){
        $_SESSION['user'] = [ 'id' => $user[0]['id'], 'name' => $user[0]['first_name']." ".$user[0]['last_name'] ];
        header("location: index.php?msg=wellcome");
    }else{
        header("location: login.html?msg=wrong_credentials");
    }
?>