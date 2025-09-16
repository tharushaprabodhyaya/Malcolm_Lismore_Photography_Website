<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Upload | Malcolm Lismore Photography</title>
  <link rel="stylesheet" href="stylesAdmin.css">
</head>
<body>
  <h1>Admin Panel - Upload Images</h1>
  <form action="uploadImage.php" method="POST" enctype="multipart/form-data">
    <label for="category">Select Category:</label>
    <select name="category" id="category" required>
      <?php
      // Fetch categories from the database
      $conn = new mysqli('localhost', 'root', '', 'photography_website');
      $result = $conn->query("SELECT * FROM categories");
      while ($row = $result->fetch_assoc()) {
        echo "<option value='{$row['id']}'>{$row['name']}</option>";
      }
      ?>
    </select>

    <label for="image">Select Image:</label>
    <input type="file" name="image" id="image" accept="image/*" required>

    <button type="submit">Upload</button>
  </form>
</body>
</html>