<?php require_once '../../../config/config.php' ?>
<?php include '../layout/header.php' ?>
<?php include '../components/navbar.php' ?>

<?php
$base     = realpath(__DIR__ . '/../../..');
$jsonPath = $base . '/data/story.json';
$json     = file_get_contents($jsonPath);
$data     = json_decode($json, true);
$chapters = $data['chapters'] ?? [];
?>

<main>
    <section class="page-title">
        <h1 class="page-header">Storyline</h1>
        <h2>The Adventure of Finn & Jake</h2>
    </section>

    <section class="content-select-container">
        <div class="content-select-bg">
            <div class="world-locations">

                <?php foreach ($chapters as $index => $chapter): ?>
                <div class="location-item">
                    <button class="location-header" onclick="toggleLocation(this)">
                        <span>
                            <span class="chapter-num">Ch.<?= $index + 1 ?></span>
                            <?= htmlspecialchars($chapter['title']) ?>
                        </span>
                        <i class="fa-solid fa-chevron-down"></i>
                    </button>
                    <div class="location-content">
                        <p><?= htmlspecialchars($chapter['summary']) ?></p>
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