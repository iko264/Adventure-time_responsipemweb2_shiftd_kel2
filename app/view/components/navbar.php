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
        <a href="<?= BASE_URL ?>index.php">
            <img src="<?= BASE_URL ?>/public/assets/pics/logo.png" alt="">
        </a>
    </div>

    <div class="nav-option">
        <ul>
            <li><a href="<?=  BASE_URL ?>index.php">Home</a></li>
            <li><a href="<?=  BASE_URL ?>app/view/pages/character.php">Character</a></li>
            <li><a href="<?=  BASE_URL ?>app/view/pages/items.php">Items</a></li>
            <li><a href="<?=  BASE_URL ?>app/view/pages/world_map.php">World Map</a></li>
            <li><a href="<?=  BASE_URL ?>app/view/pages/storyline.php">Storyline</a></li>
        </ul>
    </div>

    <div class="nav-user">
    <button type="button" class="user-pill" onclick="document.querySelector('.user-dropdown').classList.toggle('open')">
        <i class="fa-solid fa-circle-user" style="color: var(--white);"></i>
        <span><?= htmlspecialchars($username_login); ?></span>
    </button>

    <div class="user-dropdown">
        <div class="user-dropdown-header">
            <i class="fa-solid fa-circle-user"></i>
            <span><?= htmlspecialchars($username_login); ?></span>
        </div>

        <a href="<?= BASE_URL ?>auth/logout.php"
           onclick="return confirm('Apakah Anda yakin ingin keluar?')"
           class="user-dropdown-item logout-item">
            <i class="fa-solid fa-right-from-bracket"></i> Log Out
        </a>
    </div>
</div>
</nav>

<script>
// Tutup dropdown kalau klik di luar area nav-user
document.addEventListener('click', function (e) {
    const navUser = document.querySelector('.nav-user');
    const dropdown = document.querySelector('.user-dropdown');
    if (dropdown.classList.contains('open') && !navUser.contains(e.target)) {
        dropdown.classList.remove('open');
    }
});
</script>