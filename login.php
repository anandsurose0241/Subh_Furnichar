<?php     
    session_start();  


    $conn = mysqli_connect("localhost", "root", "", "shop");


    if (isset($_POST['login']) && $_POST['email'] && $_POST['password']) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Check if the email exists in the database
        $query = "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'";
        $run = mysqli_query($conn, $query);
        $data = mysqli_fetch_assoc($run);

        if ($run && $data) {
            if ($email == $data['email'] && $password == $data['password']) {
                $result = "Login successful";
                $_SESSION['email'] = $data['email'];
                header("Location: index.php");
                exit();
            } else {
                $result = "Invalid email or password";
            }
        } else {
            $result = "Invalid email or password";
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
    <title>Login - Subh Furniture</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .container {
            margin-top: 100px;
        }
        .card {
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            animation: fadeIn 0.5s ease-in-out;
        }
        .card-body h3 {
            color: #343a40;
        }
        .form-control {
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            border-color: #007bff;
            transform: scale(1.02);
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .link-container a {
            text-decoration: none;
            color: #007bff;
            transition: color 0.3s ease;
        }
        .link-container a:hover {
            color: #0056b3;
            text-decoration: underline;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>

<body>
    <header>
        <?php include_once("header.php"); ?>  
    </header>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body text-center">
                        <h3 class="mb-4">LOGIN</h3>
                        <form action="" method="post">
                            <input type="email" name="email" class="form-control mb-3" placeholder="Email" required>
                            <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
                            <div class="mb-3 text-center"><?php if(isset($_POST['login'])){ echo $result; } ?></div>
                            <button type="submit" name="login" class="btn btn-primary w-100 mb-3">LOGIN</button>
                        </form>
                        
                        <div class="link-container">
                            <p><a href="./admin/admin_login.php">Admin Login</a></p>
                            <p><a href="singup_page.php">Sign Up</a></p>
                            <p><a href="forgot_pasword.php">Forgot Password?</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
