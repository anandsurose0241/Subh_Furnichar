<?php
    session_start();
    if(!isset($_SESSION['email'])){
        header("Location:login.php");
        exit(); // Always use exit after header redirection
    } 

    $conn = mysqli_connect("localhost", "root", "", "shop");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $uname = $_SESSION['email']; // Correct variable name
    $query = "SELECT * FROM `users` WHERE `email`='$uname'"; // Fix the variable usage
    $run = mysqli_query($conn, $query);

    if ($run && mysqli_num_rows($run) > 0) {
        $data = mysqli_fetch_assoc($run);
        $id = $data['id'];
    } else {
        $data = []; 
    }

    if (isset($_POST['signup']) && !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['birthdate']) && !empty($_POST['phonenumber'])) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $birthdate = $_POST['birthdate'];
        $phonenumber = $_POST['phonenumber'];

        $query = "UPDATE `users` SET `firstname`='$firstname', `lastname`='$lastname', `email`='$email', `birthdate`='$birthdate', `phonenumber`='$phonenumber' WHERE `id`='$id'";
        $run = mysqli_query($conn, $query);

        if ($run) {
            $_SESSION['email'] = $email; 
            header("Location: home.php");
            exit();
        } else {
            $result = "Query Error";
        }
    } else if (isset($_POST['update'])) {
        $result = "All Fields Are Required | User Not Added";            
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>
    <?php include 'header.php'; ?>
<div class="container m-auto border border-info p-5 ">
    <h1 class ="text-center mb-4">Edit Profile</h1>
    <hr class="mb-4 border border-4 border-info" > 
    <form action="" method="post" enctype="multipart/form-data">
            
            <div class="mb-3">
                <label for="firstname" class="form-label">First Name</label>
                <input type="text" value="<?php echo isset($data['firstname']) ? $data['firstname'] : ''; ?>" name="firstname" class="form-control" placeholder="First Name" required>
            </div>

            <div class="mb-3">
                <label for="lastname" class="form-label">Last Name</label>
                <input type="text" value="<?php echo isset($data['lastname']) ? $data['lastname'] : ''; ?>" name="lastname" class="form-control" placeholder="Last Name" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" value="<?php echo isset($data['email']) ? $data['email'] : ''; ?>" name="email" class="form-control" placeholder="Enter Your Email" required>
            </div>

            <div class="mb-3">
                <label for="birthdate" class="form-label">Birthdate</label>
                <input type="date" value="<?php echo isset($data['birthdate']) ? $data['birthdate'] : ''; ?>" name="birthdate" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="phonenumber" class="form-label">Phone Number</label>
                <input type="number" value="<?php echo isset($data['phonenumber']) ? $data['phonenumber'] : ''; ?>" name="phonenumber" class="form-control" placeholder="Enter Your Phone Number" required>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
