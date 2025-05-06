<?php
    session_start();
    $otp = $_SESSION['otp'];
    $conn = mysqli_connect("localhost","root","","shop");
    $query1 = "UPDATE `users` SET `otp`='null' WHERE `otp`='$otp'";
    $run1 = mysqli_query($conn, $query1);
    header("Location:login.php");       
?>