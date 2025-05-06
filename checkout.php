<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "shop");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['place_order'])) {
    $customer_name = $_POST['name'];
    $customer_email = $_POST['email'];
    $payment_method = $_POST['payment_method'];
    $total_amount = $_POST['total_amount'];

    if (!empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $item) {
            $product_id = $item['id'];
            $product_name = $item['name'];
            $product_price = $item['price'];
            $category = isset($item['category']) ? $item['category'] : 'Unknown';
            $quantity = $item['quantity'];
            $order_date = date('Y-m-d H:i:s');

            // Save order to database
            $query = "INSERT INTO orders (user_email, product_id, product_name, product_price, category, order_date) 
                  VALUES ('$customer_email', '$product_id', '$product_name', '$product_price', '$category', '$order_date')";
            mysqli_query($conn, $query);
        }

        // Clear cart after order
        unset($_SESSION['cart']);

        echo "<h2 class='text-center text-success'>Order Placed Successfully! Your payment method: $payment_method</h2>";
    } else {
        echo "<h2 class='text-center text-danger'>Your cart is empty!</h2>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<header>
    <?php include 'header.php'; ?>
    </header>
    <div class="container mt-5">
        <h2 class="text-center">Checkout</h2>
        <form method="post">
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <h4>Choose Payment Method:</h4>
            <input type="radio" name="payment_method" value="Cash on Delivery" checked> Cash on Delivery <br><br>

            <input type="hidden" name="total_amount" value="5000"> <!-- Example total amount -->

            <button type="submit" name="place_order" class="btn btn-success">Place Order</button>
        </form>
    </div>
</body>
</html>
