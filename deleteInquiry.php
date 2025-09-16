<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['inquiryId'])) {
    $conn = new mysqli('localhost', 'root', '', 'photography_website');
    $id = intval($_POST['inquiryId']);
    $conn->query("DELETE FROM inquiries WHERE id = $id");
    $conn->close();
}
header("Location: admin.php");
exit;