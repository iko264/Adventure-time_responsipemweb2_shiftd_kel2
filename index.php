<?php include 'app/view/layout/header.php' ?>

    <?php include 'app/view/components/navbar.php'; ?>

    <main>
        <div class="page-header">
            <h2>Welcome To The</h2>
            <h1>Land Of Ooo</h1>
        </div>

        <div class="menu-container">
            <div class="menu-card" style="--card-color:#EFE467; border: 2.5px solid #baaf3b;">
                <a href="app/view/pages/characters.php">
                    <img src="public/assests/pics/icon-finn.png" alt="Icon Character" width="50px"> Character
                </a>
            </div>

            <div class="menu-card" style="--card-color:#F6A5C0; border: 2.5px solid #ce6487;">
                <a href="app/view/pages/items.php">
                    <img src="public/assests/pics/icon-crown.png" alt="Icon Character" width="50px"> Items
                </a>
            </div>

            <div class="menu-card" style="--card-color:#4BE462; border: 2.5px solid #27b93d;">
                <a href="app/view/pages/map.php">
                    <img src="public/assests/pics/icon-map.png" alt="Icon Character" width="50px"> World Map
                </a>
            </div>

            <div class="menu-card" style="--card-color:#6773df; border: 2.5px solid #4C58C0;">
                <a href="app/view/pages/storyline.php">
                    <img src="public/assests/pics/icon-book.png" alt="Icon Character" width="50px"> Storyline
                </a>
            </div>
        </div>
    </main>

<?php include 'app/view/layout/footer.php' ?>