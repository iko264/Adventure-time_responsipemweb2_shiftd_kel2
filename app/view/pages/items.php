<?php require_once '../../../config/config.php' ?>

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
                <a href="#" class="content-card">
                    <img src="<?= BASE_URL ?>/public/assets/pics/icon-crown.png" alt="Finn" width="50px">
                    <h3>Ice King's Crown</h3>
                </a>

                <a href="#" class="content-card">
                    <img src="<?= BASE_URL ?>/public/assets/pics/icon-book.png" alt="Bubblegum">
                    <h3>Enrichidion</h3>
                </a>

                <a href="#" class="content-card add-card">
                    <i class="fa-solid fa-plus"></i>
                    <h3>Add Character</h3>
                </a>

            </div>

        </div>
    </section>
</main>

<?php include '../layout/footer.php' ?>