<?php require_once '../../../config/config.php' ?>

    <?php include '../layout/header.php' ?>
    <?php include '../components/navbar.php' ?>

    <main>
        <section class="page-title">
            <h1 class="page-header">Characters</h1>
            <h2>Explore the citizens of Ooo</h2>
        </section>

    <section class="content-select-container">
        <div class="content-select-bg">

            <div class="content-grid">
                <a href="#" class="content-card">
                    <img src="<?= BASE_URL ?>/public/assets/pics/finn.png" alt="Finn" width="50px">
                    <h3>Finn the Human</h3>
                </a>

                <a href="#" class="content-card">
                    <img src="<?= BASE_URL ?>/public/assets/pics/bubblegum.png" alt="Bubblegum">
                    <h3>Princess Bubblegum</h3>
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