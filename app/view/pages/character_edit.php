<?php 
include_once __DIR__ . '/../../../config/config.php';
include_once __DIR__ . '/../../../config/koneksi.php';
require_once '../../../config/cek_auth.php'; // 1. Wajib ada di paling atas

// 2. Blokir jika role BUKAN admin
if ($_SESSION['role'] !== 'admin') {
    echo "<script>alert('Akses Ditolak! Hanya Admin yang berhak melakukan tindakan ini.'); document.location.href='character.php';</script>";
    exit;
}
require_once __DIR__ . '/../../../models/character.php';

$id = $_GET['id'];
$k = getKarakterById($id);

if (isset($_POST['submit'])) {
    if (updateKarakter($_POST, $_FILES) >= 0) {
        echo "<script>alert('Karakter berhasil diperbarui!'); document.location.href='character_detail.php?id=$id';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data!');</script>";
    }
}
?>

<?php include '../layout/header.php' ?>
<?php include '../components/navbar.php' ?>

<main>
    <section class="page-title">
        <h1 class="page-header">Edit Character</h1>
        <h2>Modify the character details</h2>
    </section>

    <section class="content-select-container">
        <div class="content-select-bg">
            <form action="" method="post" class="add-form" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $k['id']; ?>">
                <input type="hidden" name="gambarLama" value="<?= $k['gambar']; ?>">

                <label>Current Image</label><br>
                <img src="<?= BASE_URL ?>/public/assets/pics/<?= $k['gambar']; ?>" width="150" style="margin-bottom: 10px;"><br>
                
                <label for="gambar">Upload New Image (Optional)</label>
                <input type="file" id="gambar" name="gambar" accept="image/*"><br>

                <label for="nama">Character Name</label>
                <input type="text" id="nama" name="nama" value="<?= $k['nama']; ?>" required><br>

                <label for="occupation">Occupation</label>
                <input type="text" id="occupation" name="occupation" value="<?= $k['occupation']; ?>" required><br>

                <label for="home">Home</label>
                <input type="text" id="home" name="home" value="<?= $k['home']; ?>" required><br>

                <label for="deskripsi">Description</label>
                <textarea id="deskripsi" name="deskripsi" rows="4" required><?= $k['deskripsi']; ?></textarea><br>

                <button type="submit" name="submit" class="submit-btn">Update Character</button>
                <a href="character_detail.php?id=<?= $id; ?>" style="margin-left: 10px; color: red;">Cancel</a>
            </form>
        </div>
    </section>
</main>

<?php include '../layout/footer.php' ?>