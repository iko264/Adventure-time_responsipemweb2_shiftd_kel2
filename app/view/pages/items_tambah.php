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

if (isset($_POST['submit'])) {
    if (tambahItem($_POST) > 0) {
        echo "<script>alert('Item berhasil ditambahkan!'); document.location.href='items.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan item! " . mysqli_error($koneksi) . "');</script>";
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

            <form action="" method="post" class="add-form">
                <label for="nama">Item Name</label>
                <input type="text" id="nama" name="nama" required><br>

                <label for="pemilik">Owner</label>
                <input type="text" id="pemilik" name="pemilik"><br>

                <label for="abilities">Abilities</label>
                <input type="text" id="abilities" name="abilities"><br>

                <label for="deskripsi">Description</label>
                <textarea id="deskripsi" name="deskripsi" rows="4"></textarea><br>

                <button type="submit" name="submit" class="submit-btn">Add Item</button>
            </form>

        </div>
    </section>
</main>

<?php include '../layout/footer.php' ?>