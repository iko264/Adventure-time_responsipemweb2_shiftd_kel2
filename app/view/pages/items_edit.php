<?php 
include_once __DIR__ . '/../../../config/config.php';
include_once __DIR__ . '/../../../config/koneksi.php';
require_once '../../../config/cek_auth.php'; // 1. Wajib ada di paling atas

// 2. Blokir jika role BUKAN admin
if ($_SESSION['role'] !== 'admin') {
    echo "<script>alert('Akses Ditolak! Hanya Admin yang berhak melakukan tindakan ini.'); document.location.href='character.php';</script>";
    exit;
}
require_once __DIR__ . '/../../../models/items.php';

$id = $_GET['id'];
$item = getItemById($id);

if (isset($_POST['submit'])) {
    if (updateItem($_POST, $_FILES) >= 0) {
        echo "<script>alert('Item berhasil diperbarui!'); document.location.href='items_detail.php?id=$id';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui item!');</script>";
    }
}
?>

<?php include '../layout/header.php' ?>
<?php include '../components/navbar.php' ?>

<main>
    <section class="page-title">
        <h1 class="page-header">Edit Item</h1>
        <h2>Modify the magical item details</h2>
    </section>

    <section class="content-select-container">
        <div class="content-select-bg">
            <form action="" method="post" class="add-form" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $item['id']; ?>">
                <input type="hidden" name="gambarLama" value="<?= $item['gambar']; ?>">

                <label>Current Image</label><br>
                <img src="<?= BASE_URL ?>/public/assets/pics/<?= $item['gambar']; ?>" width="150" style="margin-bottom: 10px;"><br>
                
                <label for="gambar">Upload New Image (Optional)</label>
                <input type="file" id="gambar" name="gambar" accept="image/*"><br>

                <label for="nama">Item Name</label>
                <input type="text" id="nama" name="nama" value="<?= $item['nama']; ?>" required><br>

                <label for="pemilik">Owner</label>
                <input type="text" id="pemilik" name="pemilik" value="<?= $item['pemilik']; ?>"><br>

                <label for="abilities">Abilities</label>
                <input type="text" id="abilities" name="abilities" value="<?= $item['abilities']; ?>"><br>

                <label for="deskripsi">Description</label>
                <textarea id="deskripsi" name="deskripsi" rows="4"><?= $item['deskripsi']; ?></textarea><br>

                <button type="submit" name="submit" class="submit-btn">Update Item</button>
                <a href="items_detail.php?id=<?= $id; ?>" style="margin-left: 10px; color: red;">Cancel</a>
            </form>
        </div>
    </section>
</main>

<?php include '../layout/footer.php' ?>