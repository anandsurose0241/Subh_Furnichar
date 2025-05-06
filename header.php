<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


$conn = mysqli_connect("localhost", "root", "", "shop");

$data = []; 

if (isset($_SESSION['email'])) {
  $email = $_SESSION['email'];
  $query = "SELECT * FROM users WHERE email = '$email'";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_assoc($result);
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dynamic Colorful Header</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    /* Old CSS remains same as you provided */
    header {
      background: linear-gradient(135deg, #ff7a18, #af002d, #3205f1);
      color: white;
      animation: fadeIn 1.5s ease-out;
    }

    button img,
    .logo {
      transition: transform 0.3s ease-in-out, filter 0.3s ease-in-out;
    }

    button img:hover,
    .logo:hover {
      transform: scale(1.1);
      filter: brightness(1.2);
    }

    marquee {
      font-size: 1.2rem;
      font-weight: bold;
      color: #fff;
      animation: marqueeAnimation 10s linear infinite;
    }

    @keyframes marqueeAnimation {
      0% {
        transform: translateX(100%);
      }

      100% {
        transform: translateX(-100%);
      }
    }

    .btn-outline-secondary {
      border: 2px solid #fff;
      background-color: transparent;
      color: white;
      transition: background-color 0.3s, border-color 0.3s;
    }

    .btn-outline-secondary:hover {
      background-color: white;
      color: #000;
      border-color: #000;
    }

    @keyframes fadeIn {
      0% {
        opacity: 0;
      }

      100% {
        opacity: 1;
      }
    }

    .logo {
      animation: scaleIn 1s ease-out;
    }

    @keyframes scaleIn {
      0% {
        transform: scale(0);
      }

      100% {
        transform: scale(1);
      }
    }

    .form-control {
      animation: fadeIn 1.5s ease-out;
    }

    .nav-link {
      animation: fadeIn 2s ease-out;
    }
  </style>
</head>

<body>
  <header class="py-3 mb-4">
    <div class="container">
      <marquee behavior="alternate">🙏 ❤️ 🙏 WELCOME TO SUBH FURNITURE 🙏 ❤️ 🙏</marquee>

      <div class="d-flex justify-content-between align-items-center">
        <a href="index.php">
          <img class="logo" src="./image/logo_shub-removebg-preview.png" alt="logo" title="logo"
            style="max-height: 100px;">
        </a>

        <input class="form-control w-25" type="search" name="search_data" id="search_data" placeholder="Search">

        <div>
          <button class="btn btn-outline-secondary">
            <img src="./image/track oder logo.png" alt="track order" title="track order" style="max-height: 40px;">
          </button>

          <button class="btn btn-outline-secondary">
            <a href="login.php">
              <img src="./image/login sinup logo.png" alt="login" title="login & sign up" style="max-height: 40px;">
            </a>
          </button>

          <button class="btn btn-outline-secondary">
            <img src="./image/whish list logo.png" alt="wishlist" title="wishlist" style="max-height: 40px;">
          </button>

          <button class="btn btn-outline-secondary">
            <a href="cart.php">
              <img src="./image/cart logo.png" alt="cart" title="cart" style="max-height: 40px;">
            </a>
          </button>
        </div>
      </div>

      <?php if (!empty($data)) { ?>
        <div class="d-flex align-items-center mt-3">

   <img src="<?php echo trim($data['u_photo'], "./"); ?>" alt="userphoto" height="50px"
              class="rounded-circle border">


          
          <div class="dropdown mx-3">
            <a class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
              aria-expanded="false">
              <?php echo htmlspecialchars($data['email']); ?>
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <li><a class="dropdown-item" href="edit_profile.php">Edit Profile</a></li>
              <li><a class="dropdown-item" href="logout.php">Logout</a></li>
            </ul>
          </div>
        </div>
      <?php } ?>
    </div>
  </header>

  <div id="result" class="text-center fs-5 fw-bold"></div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function () {
      $("#search_data").keyup(function () {
        var searchText = $(this).val();
        if (searchText != '') {
          $.ajax({
            url: "./search.php",
            method: "post",
            data: { search_data: searchText },
            success: function (response) {
              $("#result").html(response);
            }
          });
        } else {
          $("#result").html('');
        }
      });
    });
  </script>
</body>

</html>