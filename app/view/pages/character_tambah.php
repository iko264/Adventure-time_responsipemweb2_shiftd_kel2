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
    $result = tambahKarakter($_POST, $_FILES);
    
    if ($result > 0) {
        echo "<script>alert('Data berhasil ditambahkan!'); document.location.href='character.php';</script>";
    } else {
        echo "<script>alert('Gagal! " . mysqli_error($koneksi) . "');</script>";
    }
}
?>

<main>
    <section class="page-title">
        <h1 class="page-header">Add Character</h1>
        <h2>Fill the form to add a new character to the database</h2>
    </section>

    <section class="content-select-container">
        <div class="content-select-bg">

            <form action="" method="post" class="create-form" enctype="multipart/form-data">

                <!-- Baris atas: portrait + fields -->
                <div class="create-top">

                    <!-- Portrait Upload -->
                    <div class="create-portrait">
                        <label for="inputGambar" class="portrait-upload-label">
                            <img src="" id="portrait-preview" alt="Preview" style="display:none;">
                            <div class="portrait-placeholder" id="portrait-placeholder">
                                <i class="fa-solid fa-image"></i>
                                <span>Upload Portrait</span>
                            </div>
                        </label>
                        <input type="file" name="gambar" id="inputGambar"
                               accept="image/*" style="display:none;"
                               onchange="previewPortrait(this)">
                    </div>

                    <!-- Input Fields -->
                    <div class="create-fields">
                        <div class="create-row">
                            <label class="create-label" for="name">Character Name</label>
                            <input type="text" id="name" name="name"
                                   placeholder="e.g. Finn the Human" required>
                        </div>
                        <div class="create-row">
                            <label class="create-label" for="occupation">Occupation</label>
                            <input type="text" id="occupation" name="occupation"
                                   placeholder="e.g. Hero / Adventurer" required>
                        </div>
                        <div class="create-row">
                            <label class="create-label" for="home">Home</label>
                            <input type="text" id="home" name="home"
                                   placeholder="e.g. The Tree Fort" required>
                        </div>
                    </div>
                </div>

                <!-- Deskripsi -->
                <div class="create-desc">
                    <span class="create-desc-label">Description</span>
                    <textarea id="description" name="description" rows="4"
                              placeholder="Write a brief description of this character..." required></textarea>
                </div>

                <!-- Tombol Aksi -->
                <div class="create-actions">
                    <a href="character.php" class="btn-cancel">Cancel</a>
                    <button type="submit" class="btn-save" name="submit">Add Character</button>
                </div>

            </form>

        </div>
    </section>
</main>

<script>
function previewPortrait(input) {
    const preview = document.getElementById('portrait-preview');
    const placeholder = document.getElementById('portrait-placeholder');
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => {
            preview.src = e.target.result;
            preview.style.display = 'block';
            placeholder.style.display = 'none';
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>

<?php include '../layout/footer.php' ?>