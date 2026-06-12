<?php
session_start();

// 1. Panggil file modelnya
require_once '../models/auth.php'; 

// Jika sudah login, langsung tendang ke halaman character
if (isset($_SESSION['role'])) {
    header("Location: ../index.php");
    exit;
}

// 2. Tangkap aksi dari form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Logika jika tombol "Sign In" (Admin/User) ditekan
    if (isset($_POST['masuk'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // 3. Gunakan fungsi dari model
        $user = cekLogin($username, $password);
        
        if ($user) {
            // Jika login berhasil, set session berdasarkan data dari database
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role']; 
            
            header("Location: ../index.php");
            exit;
        } else {
            $error = "Username atau Password salah!";
        }
    }
    
    // Logika jika tombol "Sign In As Guest" ditekan (Tidak butuh ke database)
    if (isset($_POST['guest'])) {
        $_SESSION['username'] = 'Guest';
        $_SESSION['role'] = 'guest'; 
        
        header("Location: ../index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adventure Time Wiki</title>
    <link rel="stylesheet" href="../public/assets/css/style.css">
    <link rel="stylesheet" href="../public/assets/css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mochiy+Pop+One&family=Outfit:wght@100..900&display=swap" rel="stylesheet">
</head>
<body>

    <header>
        <img src="../public/assets/pics/logo.png" width="200px" alt="Logo Adventure Time">
    </header>

    <main>
        <div class="login-title">
            <h1 class="font-style">Welcome To Wiki Fandom</h1>
            <h2 class="font-style">Sign In Now</h2>
        </div>

        <div class="login-box">
            <div class="login-form">
                
                <?php if(isset($error)) : ?>
                    <p style="color: red; text-align: center;"><?= $error; ?></p>
                <?php endif; ?>

                <form action="" method="POST">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" placeholder="Enter Your Username" required>

                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter Your Password" required>

                    <input type="submit" name="masuk" id="masuk" value="Sign In" class="font-style">
                    
                    <input type="submit" name="guest" id="guest" value="Sign In As Guest" class="font-style" formnovalidate>
                </form>
            </div>
        </div>
    </main>
</body>
</html>