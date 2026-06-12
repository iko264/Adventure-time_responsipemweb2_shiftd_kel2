<?php
session_start();

// Jika session role belum ada, berarti belum login. Tendang ke halaman login!
if (!isset($_SESSION['role'])) {
    header("Location: ../../../auth/login.php"); 
    exit;
}
?>