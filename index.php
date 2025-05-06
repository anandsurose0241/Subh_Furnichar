
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shubh Furniture</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            overflow-x: hidden; 
            animation: fadeIn 2s ease-in;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .category {
            text-align: center;
            width: 15%;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
            opacity: 0.9;
        }
        .category:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            opacity: 1;
            animation: bounce 0.5s ease-out;
        }
        @keyframes bounce {
            0% { transform: scale(1.1); }
            20% { transform: scale(1.15); }
            50% { transform: scale(1.05); }
            80% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }
        header {
            background-color: rgba(52, 58, 64, 0.8);
            color: white;
            padding: 20px 0;
            text-align: center;
            animation: slideDown 1s ease-out;
        }
        @keyframes slideDown {
            0% { transform: translateY(-100px); opacity: 0; }
            100% { transform: translateY(0); opacity: 1; }
        }
        #connect img {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        #connect img:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }
        .project-main {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 15px;
            padding: 20px;
        }
        .category img {
            width: 100px;
            height: auto;
            object-fit: cover;
            border-radius: 10px;
        }
        .category h4 {
            margin-top: 10px;
            font-size: 1rem;
            font-weight: bold;
            color: #007bff;
        }
        footer {
            background-color: rgba(52, 58, 64, 0.8);
            color: white;
            padding: 40px 0;
            text-align: center;
            opacity: 0;
            animation: fadeInFooter 2s ease-out 0.5s forwards;
        }
        @keyframes fadeInFooter {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .carousel-control-prev, .carousel-control-next {
            opacity: 0.7;
            transition: opacity 0.3s ease;
        }
        .carousel-control-prev:hover, .carousel-control-next:hover {
            opacity: 1;
        }
        .title {
            text-align: center;
            font-size: 2.5rem;
            font-weight: bold;
            color: rgb(255, 89, 0);
            margin-top: 40px;
            margin-bottom: 30px;
            text-decoration: underline;
            animation: fadeIn 2s forwards;
        }
    </style>
</head>

<body>
    <header>
        <?php include 'header.php'; ?>
    </header>

    <main>
        
        <video src="video/video.mp4" class="d-block w-100" autoplay muted loop></video>

        
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="image/sid 1.jpg" class="d-block w-100" alt="Furniture 1">
                </div>
                <div class="carousel-item">
                    <img src="image/sid 2.png" class="d-block w-100" alt="Furniture 2">
                </div>
                <div class="carousel-item">
                    <img src="image/sid 3.png" class="d-block w-100" alt="Furniture 3">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        
        <div class="title">Explore Our Furniture Range</div>

        
        <div class="project-main">
            <a class="category" href="sofa.php">
                <img src="https://www.ulcdn.net/media/Web-home-popular-categories/Sofas.png" alt="Sofas">
                <h4>Sofas</h4>
            </a>
            <a class="category" href="bed.php">
                <img src="https://www.ulcdn.net/media/web-home-popular-categories/Beds.png" alt="Beds">
                <h4>Beds</h4>
            </a>
            <a class="category" href="dining.php">
                <img src="https://www.ulcdn.net/media/web-home-popular-categories/Dining.png" alt="Dining">
                <h4>Dining</h4>
            </a>
            <a class="category" href="wardrobs.php">
                <img src="https://www.ulcdn.net/media/web-home-popular-categories/Wardrobes.png" alt="Wardrobes">
                <h4>Wardrobes</h4>
            </a>
            <a class="category" href="shoe_rack.php">
                <img src="https://www.ulcdn.net/media/web-home-popular-categories/Shoe_Racks.png" alt="Shoe Racks">
                <h4>Shoe Racks</h4>
            </a>
            <a class="category" href="bookshelves.php">
                <img src="https://www.ulcdn.net/media/web-home-popular-categories/Bookshelves.png" alt="Bookshelves">
                <h4>Bookshelves</h4>
            </a>
            <a class="category" href="tv_unit.php">
                <img src="https://www.ulcdn.net/media/web-home-popular-categories/TV_units.png" alt="TV Units">
                <h4>TV Units</h4>
            </a>
        </div>

        
        <div class="text-center mt-4">
            <span id="connect">Connect With Us:</span>
            <hr color="red"><br>
            <a href="https://www.instagram.com/shubh_furniture_work/"><img src="image/download-removebg-preview.png" height="100px"></a>
            <a href="https://www.youtube.com/@Shubhamsangule/shorts"><img src="image/youtube-removebg-preview.png" height="100px"></a>
            <a href="https://web.whatsapp.com/"><img src="image/whatsapp logo.png" height="100px"></a>
            <a href="https://www.facebook.com/urbanladder"><img src="image/fecebook_logo-removebg-preview.png" height="100px"></a>
        </div>

        
        <details>
            <summary>Click to reveal more</summary>
            <footer>
                <div>
                    <span id="connect">Popular Furniture Categories:</span><br><br>
                    <p>Bed, Beds By Design, Sofa Set, Wooden Sofa, Sofas By Design, Sofa Cum Bed...</p>
                    <span id="connect">Shop Furniture By Room:</span><br><br>
                    <p>Living Room Furniture, Bedroom Furniture, Dining Room Furniture...</p>
                    <span id="connect">Popular Decor Categories:</span><br><br>
                    <p>Home Decor, Carpets, Mirrors, Study Lamps, Table Lamps...</p>
                    <span id="connect">Popular Mattress Categories:</span><br><br>
                    <p>Mattresses, Single Bed Mattresses, Double Bed Mattresses...</p>
                    <span id="connect">Popular Tableware Categories:</span><br><br>
                    <p>Shot Glass, Dinner Plates, Baking Tray, Forks...</p>
                    <span id="connect">Delivering in:</span><br><br>
                    <p>Aanamalai, Adilabad, Ahmedabad, Ajmer...</p>
                </div>
            </footer>
        </details>
    </main>

    
    <script>
  document.addEventListener('DOMContentLoaded', function() {
    const carouselElement = document.querySelector('#carouselExampleIndicators');
    const carousel = new bootstrap.Carousel(carouselElement, {
      interval: 2000, 
      ride: 'carousel'
    });
  });
</script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
