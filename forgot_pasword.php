<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if (isset($_SESSION['email'])) {
    header("Location:home.php");
    
}

$conn = mysqli_connect("localhost", "root", "", "shop");


if (isset($_POST['send_otp']) && $_POST['email'] && $_POST['phonenumber'])  {
        $email = $_POST['email'];
        $phonenumber = $_POST['phonenumber'];
        $random = str_shuffle("12345678900987654321");
        $otp = substr($random, 1, 6);
        $_SESSION['otp'] = $otp;
        
        $query = "UPDATE `users` SET `otp`='$otp' WHERE `email`='$email' AND `phonenumber`='$phonenumber'";
        $run = mysqli_query($conn, $query);
        

        if ($run) {
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'anandsurose0241@gmail.com';
                $mail->Password   = 'vzclgaqhhtoibozn';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port       = 465;
                
                $mail->setFrom('anandsurose0241@gmail.com', 'Admin');
                $mail->addAddress($email);
                $mail->isHTML(true);
                $mail->Subject = 'One Time Password';
                $mail->Body    = '<p><mark>OTP:</mark> ' . $otp . '</p>';
                
                $mail->send();
                header("Location: change_password.php");
                exit();
            } catch (Exception $e) {
                $result = "Mailer Error: " . $mail->ErrorInfo;
            }
        } else {
            $result = "Failed to update OTP. Please try again.";
        }
    } else {
        $result = "All fields are required.";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include_once('./header.php'); ?>
    <main class="row m-auto my-2 border border-2 border-info">
        <form method="post" class="col-6 border border-info py-3 my-5 mx-auto">
            <h1 class="text-center bg-info my-2">Forgot Password</h1>
            <input type="email" name="email" placeholder="Enter Your Registered Email" class="form-control mb-2" required>
            <input type="text" name="phonenumber" placeholder="Enter Your Registered Mobile" class="form-control mb-2" required>
            <div class="mb-3 text-center"><?php if (isset($_POST['send_otp'])) { echo $result; } ?></div>
            <div class="text-center mb-2">
                <button type="submit" class="btn btn-success" name="send_otp">Send OTP</button>
            </div>
        </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
