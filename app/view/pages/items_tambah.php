<?php 
include_once __DIR__ . '/../../../config/config.php';
include_once __DIR__ . '/../../../config/koneksi.php';
require_once '../../../config/cek_auth.php'; // 1. Wajib ada di paling atas

// 2. Blokir jika role BUKAN admin
if ($_SESSION['role'] !== 'admin') {
    echo "<script>alert('Akses Ditolak! Hanya Admin yang berhak melakukan tindakan ini.'); document.location.href='items.php';</script>";
    exit;
}
?>

<?php
require_once __DIR__ . '/../../../models/items.php';

if (isset($_POST['submit'])) {
    $result = tambahItem($_POST, $_FILES);
    
    if ($result > 0) {
        echo "<script>alert('Data berhasil ditambahkan!'); document.location.href='character.php';</script>";
    } else {
        echo "<script>alert('Gagal! " . mysqli_error($koneksi) . "');</script>";
    }
}
?>

<?php include '../layout/header.php' ?>
<?php include '../components/navbar.php' ?>

<main>
    <section class="page-title">
        <h1 class="page-header">Add Item</h1>
        <h2>Add a magical or ordinary item to the database</h2>
    </section>

    <section class="content-select-container">
        <div class="content-select-bg">

            <form action="" method="post" class="create-form">

                <!-- Input Fields (tanpa portrait) -->
                <div class="create-fields">
                    <div class="create-row">
                        <label class="create-label" for="nama">Item Name</label>
                        <input type="text" id="nama" name="nama"
                               placeholder="e.g. Enchiridion" required>
                    </div>
                    <div class="create-row">
                        <label class="create-label" for="pemilik">Owner</label>
                        <input type="text" id="pemilik" name="pemilik"
                               placeholder="e.g. Finn the Human">
                    </div>
                    <div class="create-row">
                        <label class="create-label" for="abilities">Abilities</label>
                        <input type="text" id="abilities" name="abilities"
                               placeholder="e.g. Grants wishes, portal summoning">
                    </div>
                </div>

                <!-- Deskripsi -->
                <div class="create-desc">
                    <span class="create-desc-label">Description</span>
                    <textarea id="deskripsi" name="deskripsi" rows="4"
                              placeholder="Describe this item, its origin, and its significance..."></textarea>
                </div>

                <!-- Tombol Aksi -->
                <div class="create-actions">
                    <a href="items.php" class="btn-cancel">Cancel</a>
                    <button type="submit" name="submit" class="btn-save">Add Item</button>
                </div>

            </form>

        </div>
    </section>
</main>

<?php include '../layout/footer.php' ?>