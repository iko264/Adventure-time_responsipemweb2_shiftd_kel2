<?php require_once '../../../config/config.php' ?>
<?php require_once '../../../config/cek_auth.php' ?>
    <?php include '../layout/header.php' ?>
    <?php include '../components/navbar.php' ?>

    <main>
        <section class="page-title">
            <h1 class="page-header">Items</h1>
            <h2>See the Magical Items From Ooo</h2>
        </section>

    <section class="content-select-container">
        <div class="content-select-bg">
            <div class="content-grid">
                <?php 
                require_once '../../../models/items.php';
                $dataItems = getAllItems();
                while ($row = mysqli_fetch_assoc($dataItems)) : ?>
                    <a href="items_detail.php?id=<?= $row['id']; ?>" class="content-card">
                        <img src="<?= BASE_URL ?>/public/assets/pics/<?= $row['gambar']; ?>" alt="<?= $row['nama']; ?>" width="100px">
                        <h3><?= $row['nama']; ?></h3>
                    </a>
                <?php endwhile; ?>
                <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') : ?>
                    <a href="items_tambah.php" class="content-card add-card">
                        <i class="fa-solid fa-plus"></i>
                        <h3>Add Item</h3>
                    </a>
                <?php endif; ?>
            </div>

        </div>
    </section>
</main>

<?php include '../layout/footer.php' ?>