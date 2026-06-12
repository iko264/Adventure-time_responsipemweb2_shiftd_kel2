<?php 
include_once __DIR__ . '/../../../config/config.php';
include_once __DIR__ . '/../../../config/koneksi.php';
require_once '../../../config/cek_auth.php'; // 1. Wajib ada di paling atas

// 2. Blokir jika role BUKAN admin
if ($_SESSION['role'] !== 'admin') {
    echo "<script>alert('Akses Ditolak! Hanya Admin yang berhak melakukan tindakan ini.'); document.location.href='character.php';</script>";
    exit;
}
?>

<?php include '../layout/header.php' ?>
<?php include '../components/navbar.php' ?>
<?php 
require_once __DIR__ . '/../../../models/character.php';

if (isset($_POST['submit'])) {
    // Jalankan fungsi dan tangkap hasil
    $result = tambahKarakter($_POST, $_FILES);
    
    if ($result > 0) {
        echo "<script>alert('Data berhasil ditambahkan!'); document.location.href='character.php';</script>";
    } else {
        // Jika gagal, tampilkan error dari database
        echo "<script>alert('Gagal! " . mysqli_error($koneksi) . "');</script>";
    }
}
?>

<main>
    <section class="page-title">
        <h1 class="page-header">Add Character</h1>
        <h2>Fill the form to add a new character</h2>
    </section>

    <section class="content-select-container">
        <div class="content-select-bg">

            <form action="" method="post" class="add-form" enctype="multipart/form-data">
                <img src="" id="imgPreview" alt="Preview Gambar" style="width: 200px; display: none;">
                <input type="file" name="gambar" id="inputGambar" onchange="previewGambar()" accept="image/*"><br>
                <label for="name">Character Name</label>
                <input type="text" id="name" name="name" required><br>
                <label for="occupation">Occupation</label>
                <input type="text" id="occupation" name="occupation" required><br>
                <label for="home">Home</label>
                <input type="text" id="home" name="home" required><br>
                <label for="description">Description</label>
                <textarea id="description" name="description" rows="4" required></textarea><br>

                <button type="submit" class="submit-btn" name="submit">Add Character</button>
            </form>

        </div>
    </section>
</main>
<?php include '../layout/footer.php' ?>