<?php
    session_start();
    $result = "";
    $conn = mysqli_connect("localhost","root","","shop");
    if (isset($_POST['update_password']) && $_POST['otp'] && $_POST['password'] && $_POST['confirmpassword'])
    {
        if($_POST['password'] === $_POST['confirmpassword']){
            $otp = $_POST['otp'];
            $pwd = $_POST['password'];
            $query = "UPDATE `users` SET `password`='$pwd' WHERE `otp`='$otp'";
            $run = mysqli_query($conn, $query);
            if ($run) {
                $query1 = "UPDATE `users` SET `otp`='null' WHERE `password`='$pwd'";
                $run1 = mysqli_query($conn, $query1);
                header("Location:./login.php");
            }
            else{
                $result = "Enter Valid OTP";
            }
        }
        else{
            $result = "Enter Valid Confirm Password";
        }

    }    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>change_password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php include 'admin/componets/header.php'; ?>


     
        <form method="post" class="col-6 border border-info m-auto p-5">
            <h1 class="text-center bg-info my-2">Change Password</h1>            
            <input type="text" name="otp" class="form-control my-4" placeholder="Enter OTP">
            <input type="text" name="pwd" class="form-control my-4" placeholder="Enter New Password">
            <input type="text" name="c_pwd" class="form-control my-4" placeholder="Enter Confirm Password">
            <div class="mb-3 text-center bg-info"><?php echo $result; ?> Otp Expired In :  <span id="timer">10</span></div>
            <div class="text-center mb-2">
                <input type="submit" value="Change Password" class="btn btn-success" name="update_password">
            </div>
        </form>    
   
    <script>
        let timeLeft = 60;
        let timerInterval;
        function startTimer() {
            clearInterval(timerInterval);
            timeLeft = 60;
            document.getElementById("timer").textContent = timeLeft;                        
            timerInterval = setInterval(function () {
                timeLeft--;
                document.getElementById("timer").textContent = timeLeft;
                if (timeLeft <= 0) {
                    clearInterval(timerInterval);                    
                    alert('Your OTP Has Been Expired');
                    window.location.replace("/9AM%20PHP/Project/otp_expired.php");

                }
            }, 1000);
        }
        startTimer();
    </script>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>