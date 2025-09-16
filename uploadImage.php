<?php
// filepath: c:\xampp\htdocs\Photography Website\uploadImage.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category_id = $_POST['category'];
    $image = $_FILES['image'];

    // Validate and move the uploaded file
    if ($image['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $imagePath = $uploadDir . basename($image['name']);
        if (move_uploaded_file($image['tmp_name'], $imagePath)) {
            // Save the image path to the database
            $conn = new mysqli('localhost', 'root', '', 'photography_website');
            $stmt = $conn->prepare("INSERT INTO images (category_id, image_path) VALUES (?, ?)");
            $stmt->bind_param("is", $category_id, $imagePath);
            $stmt->execute();
            $stmt->close();
            $conn->close();

            echo "Image uploaded successfully!";
        } else {
            echo "Failed to upload the image.";
        }
    } else {
        echo "Error uploading the image.";
    }
}
?>