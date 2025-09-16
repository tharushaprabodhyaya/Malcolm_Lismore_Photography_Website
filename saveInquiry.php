<?php
// Database connection details
$host = 'localhost';
$dbname = 'photography_website';
$username = 'root'; // Default XAMPP username
$password = '';     // Default XAMPP password

// Connect to the database
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    // Prepare and execute the SQL query
    $sql = $conn->prepare("INSERT INTO inquiries (name, email, phone, message) VALUES (?, ?, ?, ?)");
    $sql->bind_param("ssss", $name, $email, $phone, $message);

    if ($sql->execute()) {
        echo "<script>
                alert('Your inquiry has been successfully sent! We’ll get back to you shortly.');
                window.location.href = 'contactUs.html'; 
              </script>";
    } else {
        echo "<script>
                alert('Error: Already used one or more among given data!" . $conn->error . "');
              </script>";
    }

    $sql->close();
}

$conn->close();
?>
