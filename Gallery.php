<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gallery | Malcolm Lismore Photography</title>
  <link rel="icon" type="image/png" href="logo head.png">
  <link rel="stylesheet" href="stylesGallery.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

  <header>
    <div class="navigation">
      <div class="navigation-items">
        <ul>
          <li><a href="Home.html">Home</a></li>
          <li><a href="Home.html#About">About</a></li>
          <li><a href="Home.html#Services">Services</a></li>
        </ul>
          <a href="Home.html" class="logo-link">
          <img src="logo.png" alt="Logo" class="logo">
          </a>
          <div class="menu-btn" onclick="console.log(clicked)"></div>
          <ul>
            <li><a href="Gallery.php">Gallery</a></li>
            <li><a href="prices.html">Prices</a></li>
            <li><a href="contactUs.html">Contact Us</a></li>
          </ul>
      </div>
    </div>
  </header>

  <input type="radio" name="photoes" id="check1" checked>
  <input type="radio" name="photoes" id="check2">
  <input type="radio" name="photoes" id="check3">
  <input type="radio" name="photoes" id="check4">
  <input type="radio" name="photoes" id="check5">
  <input type="radio" name="photoes" id="check6">

  <div class="container">
    <h1>Our Gallery</h1>
    <div class="top-content">
      <h3>Photography Gallery</h3>
      <label for="check1">All Photoes</label>
      <label for="check2">Wedding Photoes</label>
      <label for="check3">Preshoot Photoes</label>
      <label for="check4">Wildlife Photoes</label>
      <label for="check5">Portrait Photoes</label>
      <label for="check6">Event Photoes</label>
    </div>

    <!-- Gallery Added photoes  -->

            <!-- filepath: c:\xampp\htdocs\Photography Website\Gallery.php -->
      <div class="photo-gallery">
        <?php
        // Connect to the database
        $conn = new mysqli('localhost', 'root', '', 'photography_website');
      
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
      
        // Fetch images and their categories from the database
        $result = $conn->query("SELECT images.image_path, categories.name AS category_name FROM images JOIN categories ON images.category_id = categories.id");
      
        // Loop through the images and display them
        while ($row = $result->fetch_assoc()) {
            // Assign category name as a class for filtering
            $categoryClass = strtolower(str_replace(' ', '-', $row['category_name']));
            echo "<div class='photo {$categoryClass}'>
                    <img src='{$row['image_path']}' alt='{$row['category_name']} Photo'>
                  </div>";
        }
      
        // Close the database connection
        $conn->close();
        ?>
      </div>

  <footer>
    <div class="footer-content">
      <p><strong>Contact Us</strong> If you have any questions or would like to book a session, feel free to reach out! 
        <a href="contactUs.html">Get in Touch</a>
      </p>
      <p>© 2025 Malcolm Lismore Photography. All rights reserved. | <i>Developed by Tharusha Prabodhyaya</i></p>
    </div>
  </footer>

</body>
</html>