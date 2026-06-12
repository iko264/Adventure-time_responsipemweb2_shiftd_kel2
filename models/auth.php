<?php
// Pastikan path ini sesuai dengan letak folder config Anda
require_once __DIR__ . '/../config/koneksi.php';

function cekLogin($username, $password) {
    global $koneksi;
    
    // Keamanan dasar untuk mencegah SQL Injection
    $username = mysqli_real_escape_string($koneksi, $username);
    $password = mysqli_real_escape_string($koneksi, $password);

    // Cek ke database
    $query = "SELECT * FROM `users` WHERE username='$username' AND password='$password'";
    $result = mysqli_query($koneksi, $query);

    // Jika data ditemukan (baris lebih dari 0)
    if (mysqli_num_rows($result) > 0) {
        // Kembalikan data user tersebut dalam bentuk array
        return mysqli_fetch_assoc($result); 
    } else {
        // Jika tidak ditemukan, kembalikan false
        return false; 
    }
}
?>