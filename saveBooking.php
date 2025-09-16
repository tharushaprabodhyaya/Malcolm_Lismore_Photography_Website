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
    $sessionType = $_POST['sessionType'];
    $time = $_POST['time'];
    $date = $_POST['date'];
    $message = $_POST['message'];

    // Prepare and execute the SQL query
    $sql = $conn->prepare("INSERT INTO bookings (name, email, phone, session_type, preferred_time, preferred_date, message) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $sql->bind_param("sssssss", $name, $email, $phone, $sessionType, $time, $date, $message);

    if ($sql->execute()) {
        echo "<script>
                alert('Your Booking Successful! We’ll get back to you shortly.');
                window.location.href = 'contactUs.html'; // Redirect to home or login page
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
