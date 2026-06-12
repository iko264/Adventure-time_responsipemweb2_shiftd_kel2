<?php 
require_once __DIR__ . '/../../../config/config.php';
require_once '../../../config/cek_auth.php';

if ($_SESSION['role'] === 'guest') {
    echo "<script>alert('Akses Ditolak! Guest tidak dapat melihat detail.'); document.location.href='character.php';</script>";
    exit;
}
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
    <section class="content-select-container">
        <div class="content-select-bg">
            <h1><?= htmlspecialchars($item['nama']); ?></h1>
    
            <img src="<?= BASE_URL ?>/public/assets/pics/<?= htmlspecialchars($item['gambar']); ?>" alt="<?= htmlspecialchars($item['nama']); ?>" width="200px" style="display:block; margin-bottom:15px;">
    
            <p><strong>Owner:</strong> <?= htmlspecialchars($item['pemilik']); ?></p>
            <p><strong>Abilities:</strong> <?= htmlspecialchars($item['abilities']); ?></p>
    
            <div style="margin-top: 20px;">
                <p><strong>Description:</strong></p>
                <p><?= nl2br(htmlspecialchars($item['deskripsi'])); ?></p>
            </div>
    
            <br>
            <a href="items.php" class="submit-btn" style="text-decoration: none; padding: 10px 20px; background-color: #333; color: white;">Kembali</a>
            <br>
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') : ?>
            <div class="action-buttons" style="margin-top: 20px;">
                <a href="items_edit.php?id=<?= $item['id']; ?>" class="submit-btn" style="background-color: #ffc107; color: black; text-decoration: none; padding: 10px 20px; margin-right: 10px;">Edit Item</a>
                <a href="items_hapus.php?id=<?= $item['id']; ?>" class="submit-btn" style="background-color: #dc3545; color: white; text-decoration: none; padding: 10px 20px;" onclick="return confirm('Apakah Anda yakin ingin menghapus item ini?')">Delete Item</a>
            </div>
            <?php endif; ?>
        </div>
        
    </section>
</main>

<?php include '../layout/footer.php' ?>