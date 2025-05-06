<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

$conn = mysqli_connect("localhost", "root", "", "shop");

if (isset($_GET['id']) && isset($_GET['category'])) {
    $product_id = intval($_GET['id']);
    $category = mysqli_real_escape_string($conn, $_GET['category']);

    // Secure allowed category names
    $allowed_categories = ['sofa', 'bed', 'dining', 'bookshelves', 'tv_unit', 'wardrobes', 'shoe_racks'];


    if (!in_array($category, $allowed_categories)) {
        echo "Invalid Category!";
        exit();
    }

    $query = "SELECT * FROM `$category` WHERE id = $product_id";
    $result = mysqli_query($conn, $query);
    $product = mysqli_fetch_assoc($result);

    if (!$product) {
        echo "Product not found!";
        exit();
    }
} else {
    echo "Invalid Request!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Buy Now - <?php echo $product['product_name']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="container mt-5">
        <h2 class="text-center mb-4">Confirm Your Purchase</h2>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <img src="./uploads/<?php echo $product['photo']; ?>" class="card-img-top" style="height: 300px; object-fit: cover;">
                    <div class="card-body text-center">
                        <h4 class="card-title"><?php echo $product['product_name']; ?></h4>
                        <p class="card-text"><?php echo $product['product_description']; ?></p>
                        <h5 class="text-success">Price: $<?php echo $product['product_price']; ?></h5>

                        <form action="place_order.php" method="POST">
                            <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                            <input type="hidden" name="product_name" value="<?php echo $product['product_name']; ?>">
                            <input type="hidden" name="product_price" value="<?php echo $product['product_price']; ?>">
                            <input type="hidden" name="category" value="<?php echo $category; ?>">
                            <button type="submit" class="btn btn-success">Confirm Purchase</button>
                        </form>

                        <a href="<?php echo $category; ?>.php" class="btn btn-secondary mt-2">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
