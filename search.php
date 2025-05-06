<?php
$conn = mysqli_connect("localhost", "root", "", "shop");

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Get search input
$searchText = isset($_POST['search_data']) ? $_POST['search_data'] : '';
$filteredResults = [];

if (!empty($searchText)) {
  // Search each table and include category name
  $query = "
    SELECT 'sofa' AS category, product_name FROM sofa WHERE product_name LIKE '%$searchText%'
    UNION
    SELECT 'bed' AS category, product_name FROM bed WHERE product_name LIKE '%$searchText%'
    UNION
    SELECT 'dining' AS category, product_name FROM dining WHERE product_name LIKE '%$searchText%'
    UNION
    SELECT 'bookshelves' AS category, product_name FROM bookshelves WHERE product_name LIKE '%$searchText%'
    UNION
    SELECT 'tv_unit' AS category, product_name FROM tv_unit WHERE product_name LIKE '%$searchText%'
    UNION
    SELECT 'shoe_rack' AS category, product_name FROM shoe_rack WHERE product_name LIKE '%$searchText%'
  ";

  // Optionally check if wardrobe table exists and add it
  $checkWardrobe = mysqli_query($conn, "SHOW TABLES LIKE 'wardrobe'");
  if (mysqli_num_rows($checkWardrobe) > 0) {
    $query .= "
      UNION
      SELECT 'wardrobe' AS category, product_name FROM wardrobe WHERE product_name LIKE '%$searchText%'
    ";
  }

  
  $run = mysqli_query($conn, $query);

  if ($run && mysqli_num_rows($run) > 0) {
    while ($data = mysqli_fetch_assoc($run)) {
      $filteredResults[] = [
        'product_name' => $data['product_name'],
        'category' => $data['category']
      ];
    }
  }
}
?>


<?php
if (!empty($filteredResults)) {
  foreach ($filteredResults as $result) {
    $categoryPage = $result['category'] . ".php"; // e.g., bed.php
    $productName = htmlspecialchars($result['product_name']);
    $productUrl = $categoryPage . "?product_name=" . urlencode($result['product_name']);

    echo "<a href='$productUrl' class='text-decoration-none'>$productName</a><br>";
  }
} else {
  echo "<p>No results found</p>";
}
?>
