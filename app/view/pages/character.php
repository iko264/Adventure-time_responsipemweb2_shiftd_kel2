<?php require_once '../../../config/config.php' ?>
<?php include '../layout/header.php' ?>
<?php include '../components/navbar.php' ?>

<?php
$base       = realpath(__DIR__ . '/../../..');
$jsonPath   = $base . '/data/characters.json';
$json       = file_get_contents($jsonPath);
$data       = json_decode($json, true);
$characters = $data['characters'] ?? [];
?>

<main>
    <section class="page-title">
        <h1 class="page-header">Characters</h1>
        <h2>Explore the citizens of Ooo</h2>
    </section>

    <section class="content-select-container">
        <div class="content-select-bg">
            <div class="content-grid">

                <?php foreach ($characters as $char): ?>
                <a href="character_detail.php?id=<?= htmlspecialchars($char['id']) ?>" class="content-card">
                    <img src="<?= BASE_URL ?>/public/assets/pics/<?= htmlspecialchars($char['image']) ?>"
                         alt="<?= htmlspecialchars($char['name']) ?>">
                    <h3><?= htmlspecialchars($char['name']) ?></h3>
                </a>
                <?php endforeach; ?>

                <a href="character_create.php" class="content-card add-card">
                    <i class="fa-solid fa-plus"></i>
                    <h3>Add Character</h3>
                </a>

            </div>
        </div>
    </section>
</main>

<?php include '../layout/footer.php' ?>