<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "shop");

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_email = $_SESSION['email'];
    $product_id = intval($_POST['product_id']);
    $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
    $product_price = floatval($_POST['product_price']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);

    
    $insert = "INSERT INTO orders (user_email, product_id, product_name, product_price, category)
               VALUES ('$user_email', $product_id, '$product_name', $product_price, '$category')";

    if (mysqli_query($conn, $insert)) {
        $order_id = mysqli_insert_id($conn);
        echo "<div style='text-align:center; margin-top:50px; font-family:sans-serif;'>
                <h2>🎉 Order Placed Successfully!</h2>
                <p>Order ID: <strong>#{$order_id}</strong></p>
                <p>Thank you for purchasing <strong>{$product_name}</strong> for <strong>\${$product_price}</strong>.</p>
                <a href='{$category}.php' style='text-decoration:none; color:white; background:#28a745; padding:10px 20px; border-radius:5px;'>Back to {$category}</a>
              </div>";
    } else {
        echo "Something went wrong: " . mysqli_error($conn);
    }
} else {
    echo "Invalid Request!";
}
?>

