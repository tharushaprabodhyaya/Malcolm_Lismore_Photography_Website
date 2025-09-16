<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['bookingId'])) {
    $conn = new mysqli('localhost', 'root', '', 'photography_website');
    $id = intval($_POST['bookingId']);
    $conn->query("DELETE FROM bookings WHERE id = $id");
    $conn->close();
}
header("Location: admin.php");
exit;