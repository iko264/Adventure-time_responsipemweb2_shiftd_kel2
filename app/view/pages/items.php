<?php require_once '../../../config/config.php' ?>

<?php include '../layout/header.php' ?>
<?php include '../components/navbar.php' ?>

<?php
$base       = realpath(__DIR__ . '/../../..');
$jsonPath   = $base . '/data/items.json';
$json       = file_get_contents($jsonPath);
$data       = json_decode($json, true);
$items      = $data['items'] ?? [];
?>

    <main>
        <section class="page-title">
            <h1 class="page-header">Items</h1>
            <h2>See the Magical Items From Ooo</h2>
        </section>

    <section class="content-select-container">
        <div class="content-select-bg">
            <div class="content-grid">

                <?php foreach ($items as $items): ?>
                <a href="items_detail.php?id=<?= htmlspecialchars($items['id']) ?>" class="content-card">
                    <img src="<?= BASE_URL ?>/public/assets/pics/<?= htmlspecialchars($items['image']) ?>"
                         alt="<?= htmlspecialchars($items['name']) ?>">
                    <h3><?= htmlspecialchars($items['name']) ?></h3>
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