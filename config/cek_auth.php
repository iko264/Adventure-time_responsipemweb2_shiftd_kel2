<?php
session_start();

if (!isset($_SESSION['role'])) {
    header("Location: " . BASE_URL . "auth/login.php"); 
    exit;
}
?>