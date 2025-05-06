<?php 
$conn = mysqli_connect("localhost", "root", "", "shop"); 
$query = "SELECT * FROM `bookshelves`";
$run = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookshelves</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <style>
        
        .card-img-top {
            transition: transform 0.3s ease-in-out;
            object-fit: cover; 
            width: 100%;          
            height: 200px; 
        }

        .card-img-top:hover {
            transform: scale(1.1);
        }

        .card-body {
            text-align: center;
        }

        .product-card {
            margin: 15px;
        }
    </style>
</head>

<body>
    <header>
    <?php include 'header.php'; ?>
    </header>
    <div class="container mt-5">
    <h1 class="text-center mb-4">Welcome to the Bookshelves Section</h1>
    <div class="row">
        <?php while ($data = mysqli_fetch_assoc($run)) { ?>
            <div class="col-md-4">
                <div class="card">
                    <img src="./uploads/<?php echo $data['photo']; ?>" class="card-img-top" alt="Product Image">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $data['product_name']; ?></h5>
                        <p class="card-text"><?php echo substr($data['product_description'], 0, 100); ?>...</p>
                        <p class="text-success">Price: $<?php echo $data['product_price']; ?></p>

                        <?php if (isset($_SESSION['email'])) { ?>
                            
                            <a href="add_to_cart.php?id=<?php echo $data['id']; ?>" class="btn btn-primary">Add to Cart</a>
                            <a href="buy_now.php?id=<?php echo $data['id']; ?>&category=bookshelves" class="btn btn-success">Buy Now</a>
                        <?php } else { ?>
                            
                            <a href="login.php" class="btn btn-warning">Login to Purchase</a>
                        <?php } ?>
                        
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>
