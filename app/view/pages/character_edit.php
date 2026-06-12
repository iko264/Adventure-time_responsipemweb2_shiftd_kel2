<?php 
include_once __DIR__ . '/../../../config/config.php';
include_once __DIR__ . '/../../../config/koneksi.php';
require_once '../../../config/cek_auth.php'; // 1. Wajib ada di paling atas
require_once '../layout/header.php';
require_once '../components/navbar.php';

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

<main>
    <section class="content-select-container">
        <div class="content-select-bg">
            <form action="" method="post" class="edit-form" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?= $k['id']; ?>">
                <input type="hidden" name="gambarLama" value="<?= $k['gambar']; ?>">

                <div class="edit-top">
                    <div class="content-create-portrait">
                        <label for="gambar" class="portrait-upload-label">
                            <img id="portrait-preview" src="<?= BASE_URL ?>/public/assets/pics/<?= $k['gambar']; ?>" alt="<?= $k['nama']; ?>">
                        </label>
                        <input type="file" id="gambar" name="gambar" accept="image/*" style="display: none;"
                               onchange="document.getElementById('portrait-preview').src = window.URL.createObjectURL(this.files[0])">
                    </div>

                    <div class="edit-info">
                        <div class="edit-row">
                            <span class="edit-label">Change Name</span>
                            <input type="text" id="nama" name="nama" value="<?= $k['nama']; ?>" required placeholder="Character Name">
                        </div>

                        <div class="edit-row">
                            <span class="edit-label">Change Occupation</span>
                            <input type="text" id="occupation" name="occupation" value="<?= $k['occupation']; ?>" required placeholder="Occupation">
                        </div>

                        <div class="edit-row">
                            <span class="edit-label">Change Home</span>
                            <input type="text" id="home" name="home" value="<?= $k['home']; ?>" required placeholder="Home">
                        </div>
                    </div>
                </div>

                <div class="edit-desc">
                    <label for="deskripsi" class="desc-label">Description</label>
                    <textarea id="deskripsi" name="deskripsi" required placeholder="Character description..."><?= $k['deskripsi']; ?></textarea>
                </div>

                <div class="create-actions">
                    <a href="character_detail.php?id=<?= $id; ?>" class="btn-cancel">Cancel</a>
                    <button type="submit" name="submit" class="btn-save">Update Character</button>
                </div>

            </form>
        </div>
    </section>
</main>

<?php include '../layout/footer.php' ?>