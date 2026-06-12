<?php require_once '../../../config/config.php' ?>
<?php require_once '../../../config/cek_auth.php' ?>
<?php include '../layout/header.php' ?>
<?php include '../components/navbar.php' ?>

<?php
$base = realpath(__DIR__ . '/../../..');
$jsonPath = $base . '/data/maps.json';

if (!file_exists($jsonPath)) {
    die('File tidak ditemukan: ' . $jsonPath);
}

$json = file_get_contents($jsonPath);
$data = json_decode($json, true);
$locations = $data['locations'] ?? [];
?>

<main>
    <section class="page-title">
        <h1 class="page-header">World Map</h1>
        <h2>Explore the Magical World of Ooo</h2>
    </section>

    <section class="worldmap-hero">
        <img src="<?= BASE_URL ?>/public/assets/pics/world-map.png" alt="World Map Ooo">
    </section>

    <section class="content-select-container">
        <div class="content-select-bg">
            <div class="world-locations">

                <?php foreach ($locations as $loc): ?>
                <div class="location-item">
                    <button class="location-header" onclick="toggleLocation(this)">
                        <span class="part-name"><?= htmlspecialchars($loc['name']) ?></span>
                        <i class="fa-solid fa-chevron-down"></i>
                    </button>
                    <div class="location-content">
                        <p><?= htmlspecialchars($loc['description']) ?></p>
                    </div>
                </div>
                <?php endforeach; ?>

            </div>
        </div>
    </section>
</main>

<script>
function toggleLocation(btn) {
    const item = btn.parentElement;
    const isOpen = item.classList.contains('open');
    document.querySelectorAll('.location-item').forEach(i => i.classList.remove('open'));
    if (!isOpen) item.classList.add('open');
}
</script>

<?php include '../layout/footer.php' ?>