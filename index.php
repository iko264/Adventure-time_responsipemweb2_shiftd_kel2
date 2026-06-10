<?php require_once('config/config.php') ?>

    <?php include 'app/view/layout/header.php' ?>
    <?php include 'app/view/components/navbar.php' ?>

    <main>
        <div class="page-title">
            <h2>Welcome To The</h2>
            <h1>Land Of Ooo</h1>
        </div>
        
        <div class="menu-container">
            <div class="menu-card" style="--card-color: var(--yellow); border: 2.5px solid #d39f25;">
                <a href="<?=  BASE_URL ?>/app/view/pages/character.php">
                    <img src="<?= BASE_URL ?>/public/assets/pics/icon-finn.png" alt="Icon Character" width="50px"> Character
                </a>
            </div>

            <div class="menu-card" style="--card-color: var(--pink); border: 2.5px solid var(--pink-dark);">
                <a href="<?=  BASE_URL ?>/app/view/pages/items.php">
                    <img src="<?= BASE_URL ?>/public/assets/pics/icon-crown.png" alt="Icon Character" width="50px"> Items
                </a>
            </div>

            <div class="menu-card" style="--card-color: var(--green); border: 2.5px solid var(--green-dark);">
                <a href="app/view/pages/map.php">
                    <img src="<?= BASE_URL ?>/public/assets/pics/icon-map.png" alt="Icon Character" width="50px"> World Map
                </a>
            </div>

            <div class="menu-card" style="--card-color: var(--blue); border: 2.5px solid var(--blue-dark);">
                <a href="app/view/pages/storyline.php">
                    <img src="<?= BASE_URL ?>/public/assets/pics/icon-book.png" alt="Icon Character" width="50px"> Storyline
                </a>
            </div>
        </div>
    </main>
<?php include 'app/view/layout/footer.php' ?>