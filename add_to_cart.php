<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "shop");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    
    $query = "SELECT * FROM bed WHERE id='$product_id'";
    $result = mysqli_query($conn, $query);
    $product = mysqli_fetch_assoc($result);

    if ($product) {
        
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        
        if (!isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id] = [
                'id' => $product['id'],
                'name' => $product['product_name'],
                'price' => $product['product_price'],
                'quantity' => 1
            ];
        } else {
            $_SESSION['cart'][$product_id]['quantity'] += 1; 
        }
    }
}


header("Location: cart.php");
exit();
?>
