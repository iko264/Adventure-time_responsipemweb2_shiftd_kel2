<?php

//define('DB_HOST', 'localhost:3307'); // sesuaikan dengan port mysql kalian, biasanya 3306 atau 3307 
define('DB_HOST', 'localhost:3306');
define('DB_NAME', 'adventuretime'); 
define('DB_USER', 'root'); 
define('DB_PASS', 'MySQL5549'); 

$koneksi = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Cek jika koneksi gagal
if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>