<?php 
require_once __DIR__ . '/../../../config/config.php';
require_once '../../../config/cek_auth.php';

$isGuest = ($_SESSION['role'] === 'guest');

require_once __DIR__ . '/../../../models/items.php';

// Menangkap ID dari URL, pastikan tidak error jika ID kosong
$id = isset($_GET['id']) ? $_GET['id'] : 0;
$item = getItemById($id);

// Pengecekan jika item tidak ditemukan di database
if (!$item) {
    echo "<script>alert('Item tidak ditemukan!'); document.location.href='items.php';</script>";
    exit;
}
?>

<?php include '../layout/header.php' ?>
<?php include '../components/navbar.php' ?>

<main>
    <?php if (!$isGuest) : ?>
    <section class="content-select-container">
        <div class="content-select-bg">
            <div class="content-detail-bg">

                <div class="content-detail-top">
                    <div class="content-detail-image">
                        <img src="<?= BASE_URL ?>/public/assets/pics/<?= htmlspecialchars($item['gambar']); ?>" alt="<?= htmlspecialchars($item['nama']); ?>">
                    </div>

                    <div class="content-detail-info">
                        <div class="info-row">
                            <span class="info-label">Name</span>
                            <h1><?= htmlspecialchars($item['nama']); ?></h1>
                        </div>

                        <div class="info-row">
                            <span class="info-label">Owner</span>
                            <span class="info-value"><?= htmlspecialchars($item['pemilik']); ?></span>
                        </div>

                        <div class="info-row">
                            <span class="info-label">Abilities</span>
                            <span class="info-value"><?= htmlspecialchars($item['abilities']); ?></span>
                        </div>
                    </div>
                </div>

                <div class="content-detail-desc">
                    <p><?= nl2br(htmlspecialchars($item['deskripsi'])); ?></p>
                </div>

                <div class="create-actions">
                    <a href="items.php" class="btn-back">Kembali</a>

                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') : ?>
                        <a href="items_edit.php?id=<?= $item['id']; ?>" class="btn-save">Edit Item</a>
                        <a href="items_hapus.php?id=<?= $item['id']; ?>" class="btn-cancel" onclick="return confirm('Apakah Anda yakin ingin menghapus item ini?')">Delete Item</a>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </section>
    <?php endif; ?>
</main>

<?php if ($isGuest) : ?>
    <?php include '../components/popup.php' ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            showAccessPopup(
                'Guest tidak dapat melihat detail items.',
                '<?= BASE_URL ?>app/view/pages/character.php'
            );
        });
    </script>
<?php endif; ?>

<?php include '../layout/footer.php' ?>