<?php 
require_once '../../../config/config.php';
require_once '../../../config/cek_auth.php';

if ($_SESSION['role'] === 'guest') {
    echo "<script>alert('Akses Ditolak! Guest tidak dapat melihat detail.'); document.location.href='character.php';</script>";
    exit;
}
require_once '../../../models/character.php';

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM karakter WHERE id = $id");
$k = mysqli_fetch_assoc($query);
?>

<?php include '../layout/header.php' ?>
<?php include '../components/navbar.php' ?>

<main>
    <section class="content-select-container">
        <div class="content-select-bg">
            <h1><?= $k['nama']; ?></h1>
            <img src="<?= BASE_URL ?>/public/assets/pics/<?= $k['gambar']; ?>" width="300">
            <p><strong>Occupation:</strong> <?= $k['occupation']; ?></p>
            <p><strong>Home:</strong> <?= $k['home']; ?></p>
            <p><strong>Description:</strong> <?= $k['deskripsi']; ?></p>
            <a href="character.php">Kembali</a>
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') : ?>
            <div class="action-buttons" style="margin-top: 20px;">
                <a href="character_edit.php?id=<?= $k['id']; ?>" class="submit-btn">Edit Character</a>
                <a href="character_hapus.php?id=<?= $k['id']; ?>" class="submit-btn">Delete Character</a>
            </div>
            <?php endif; ?>
        </div>

    </section>
</main>

<?php include '../layout/footer.php' ?>