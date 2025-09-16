<?php
// filepath: c:\xampp\htdocs\Photography Website\deleteImage.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $imageId = $_POST['imageId'];

    // Connect to the database
    $conn = new mysqli('localhost', 'root', '', 'photography_website');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch the image path to delete the file from the server
    $stmt = $conn->prepare("SELECT image_path FROM images WHERE id = ?");
    $stmt->bind_param("i", $imageId);
    $stmt->execute();
    $stmt->bind_result($imagePath);
    $stmt->fetch();
    $stmt->close();

    // Delete the image file from the server
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }

    // Delete the image record from the database
    $stmt = $conn->prepare("DELETE FROM images WHERE id = ?");
    $stmt->bind_param("i", $imageId);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Image deleted successfully!";
    } else {
        echo "Failed to delete the image.";
    }

    $stmt->close();
    $conn->close();

    // Redirect back to the admin page
    header("Location: admin.php");
    exit();
}
?>