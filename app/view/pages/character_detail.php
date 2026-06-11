<?php require_once '../../../config/config.php' ?>
<?php include '../layout/header.php' ?>
<?php include '../components/navbar.php' ?>

<?php
// Ambil id dari URL: character_detail.php?id=finn
$id = $_GET['id'] ?? '';

$base     = realpath(__DIR__ . '/../../..');
$jsonPath = $base . '/data/characters.json';
$json     = file_get_contents($jsonPath);
$data     = json_decode($json, true);

// Cari karakter berdasarkan id
$character = null;
foreach ($data['characters'] as $c) {
    if ($c['id'] === $id) {
        $character = $c;
        break;
    }
}

// Kalau id tidak ditemukan, redirect balik ke character list
if (!$character) {
    die('ID tidak ditemukan. ID yang diterima: "' . htmlspecialchars($id) . '"');
}
?>

<main>
    <section class="page-title">
        <h1 class="page-header">Character Detail</h1>
        <h2>Get To Know More With Your Character</h2>
    </section>

    <section class="content-select-container">
        <div class="content-select-bg character-detail-bg">

            <!-- Atas: Gambar kiri + Info kanan -->
            <div class="character-detail-top">

                <div class="character-detail-image">
                    <img src="<?= BASE_URL ?>/public/assets/pics/<?= htmlspecialchars($character['image']) ?>"
                         alt="<?= htmlspecialchars($character['name']) ?>">
                </div>

                <div class="character-detail-info">
                    <div class="info-row">
                        <span class="info-label">Name</span>
                        <span class="info-value">: <?= htmlspecialchars($character['name']) ?></span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Occupation</span>
                        <span class="info-value">: <?= htmlspecialchars($character['occupation']) ?></span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Home</span>
                        <span class="info-value">: <?= htmlspecialchars($character['home']) ?></span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Species</span>
                        <span class="info-value">: <?= htmlspecialchars($character['species']) ?></span>
                    </div>
                </div>

            </div>

            <!-- Bawah: Deskripsi -->
            <div class="character-detail-desc">
                <p><?= htmlspecialchars($character['description']) ?></p>
            </div>

        </div>
    </section>
</main>

<?php include '../layout/footer.php' ?>