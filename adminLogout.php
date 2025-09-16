<?php
// filepath: c:\xampp\htdocs\Photography Website\adminLogout.php

session_start();
session_destroy();
header("Location: adminLogin.php");
exit();
?>