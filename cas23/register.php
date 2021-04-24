<?php 

    // Import PHPMailer classes into the global namespace
    // These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    // Load Composer's autoloader
    require 'vendor/autoload.php';
    include './db.php';

    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    isset($_POST['ime']) && $_POST['ime'] != "" ? $first_name = $_POST['ime'] : exit("ERR1");
    isset($_POST['prezime']) && $_POST['prezime'] != "" ? $last_name = $_POST['prezime'] : exit("ERR2");
    isset($_POST['email']) && $_POST['email'] != "" ? $email = $_POST['email'] : exit("ERR3");
    isset($_POST['password']) && $_POST['password'] != "" ? $password = $_POST['password'] : exit("ERR4");

    $password = md5($password);

    $stmt = $pdo->prepare("INSERT INTO users (first_name, last_name, email, password) VALUES (:fn, :ln, :e, :p) ");
    $stmt->bindParam(':fn', $first_name, PDO::PARAM_STR);
    $stmt->bindParam(':ln', $last_name, PDO::PARAM_STR);
    $stmt->bindParam(':e', $email, PDO::PARAM_STR);
    $stmt->bindParam(':p', $password, PDO::PARAM_STR);
    $stmt->execute();

    $new_id = $pdo->lastInsertId();

    // saljemo mail dobrodoslice
    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'akademijatest2020@gmail.com';                     // SMTP username
        $mail->Password   = 'pass12345678';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    
        //Recipients
        $mail->setFrom('phonebook_app@gmail.com', 'Welcome to PhoneBookApp');
        $mail->addAddress($email);
    
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Welcome to phonebookAPP';
        $mail->Body    = 'Welcome to our  <b>PhoneBook!</b> App';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        // echo 'Message has been sent';

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    $_SESSION['user'] = [ 'id' => $new_id, 'name' => $first_name." ".$last_name ];
    header("location: index.php?msg=wellcome");
?>