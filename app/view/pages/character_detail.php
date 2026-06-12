<?php 
require_once '../../../config/config.php';
require_once '../../../config/cek_auth.php';
require_once '../../../config/koneksi.php';
require_once '../layout/header.php';
require_once '../components/navbar.php';

$isGuest = ($_SESSION['role'] === 'guest');

require_once '../../../models/character.php';

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM karakter WHERE id = $id");
$k = mysqli_fetch_assoc($query);
?>

<main>
    <?php if (!$isGuest) : ?>
    <section class="content-select-container">
        <div class="content-select-bg">
            <div class="content-detail-bg">

                <div class="content-detail-top">
                    <div class="content-detail-image">
                        <img src="<?= BASE_URL ?>/public/assets/pics/<?= $k['gambar']; ?>" alt="<?= $k['nama']; ?>">
                    </div>

                    <div class="content-detail-info">
                        <div class="info-row">
                            <span class="info-label">Name</span>
                            <h1><?= $k['nama']; ?></h1>
                        </div>

                        <div class="info-row">
                            <span class="info-label">Occupation</span>
                            <span class="info-value"><?= $k['occupation']; ?></span>
                        </div>

                        <div class="info-row">
                            <span class="info-label">Home</span>
                            <span class="info-value"><?= $k['home']; ?></span>
                        </div>
                    </div>
                </div>

                <div class="content-detail-desc">
                    <p><?= $k['deskripsi']; ?></p>
                </div>

                <div class="create-actions">
                    <a href="character.php" class="btn-back">Kembali</a>

                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') : ?>
                        <a href="character_edit.php?id=<?= $k['id']; ?>" class="btn-save">Edit Character</a>
                        <button type="button" class="btn-cancel"
                            onclick="showDeletePopup(
                                '<?= addslashes($k['nama']); ?>',
                                'character_hapus.php?id=<?= $k['id']; ?>'
                            )">
                            Delete Character
                        </button>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </section>
    <?php endif; ?>
</main>

<?php include '../components/popup.php' ?>

<!-- Ini buat verifikasi kalo guest gabisa ngapa ngapain -->
<?php if ($isGuest) : ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            showAccessPopup(
                'Guest tidak dapat melihat detail character.',
                '<?= BASE_URL ?>app/view/pages/character.php'
            );
        });
    </script>
<?php endif; ?>


<!-- Ini buat popup penghapusan item dan character -->
<?php if (isset($_GET['deleted']) && $_GET['deleted'] == 1) : ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            showSuccessPopup(
                'Character telah berhasil dihapus dari database.',
                '<?= BASE_URL ?>app/view/pages/character.php'
            );
        });
    </script>
<?php endif; ?>

<?php include '../layout/footer.php' ?>