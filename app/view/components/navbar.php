<?php
// Pastikan session sudah menyala khusus untuk navbar ini jika file induknya terlewat
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Cek apakah username ada, jika tidak, kosongkan atau tulis 'Guest'
$username_login = isset($_SESSION['username']) ? $_SESSION['username'] : '';
?>

<nav>
    <div class="nav-logo">
        <a href="<?= BASE_URL ?>/index.php">
            <img src="<?= BASE_URL ?>/public/assets/pics/logo.png" alt="">
        </a>
    </div>

    <div class="nav-option">
        <ul>
            <li><a href="<?=  BASE_URL ?>/index.php">Home</a></li>
            <li><a href="<?=  BASE_URL ?>/app/view/pages/character.php">Character</a></li>
            <li><a href="<?=  BASE_URL ?>/app/view/pages/items.php">Items</a></li>
            <li><a href="<?=  BASE_URL ?>/app/view/pages/world_map.php">World Map</a></li>
            <li><a href="<?=  BASE_URL ?>/app/view/pages/storyline.php">Storyline</a></li>
        </ul>
    </div>`

    <div class="nav-user">
        <a href="../../../auth/logout.php" onclick="return confirm('Apakah Anda yakin ingin keluar?')" style="color: red; font-weight: bold;">
            Logout (<?= htmlspecialchars($username_login); ?>)
        </a>
        <a href="<?= BASE_URL ?>auth/login.php">
            <i class="fa-solid fa-circle-user fa-2x"></i>
        </a>
    </div>
</div>
</nav>