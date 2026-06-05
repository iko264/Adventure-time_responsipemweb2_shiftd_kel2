<?php

define('DB_HOST', 'localhost');    
define('DB_NAME', 'AdventureTime'); 
define('DB_USER', 'root');          
define('DB_PASS', '');              
define('DB_CHARSET', 'utf8mb4');    

$dsn = "mysql:host=" . DB_HOST . 
        ";port=3307" . 
        //";port=3306" . //ganti ke 3306 jika port masih default
       ";dbname=" . DB_NAME . 
       ";charset=" . DB_CHARSET;

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
    // echo "Koneksi berhasil!"; 
    
} catch (PDOException $e) {
    die("<div class='alert alert-danger m-3'>
            <strong>Error Koneksi Database!</strong><br>
            " . htmlspecialchars($e->getMessage()) . "
         </div>");
}
?>