<?= $this->extend("_pattern") ?>

<?= $this->section("assets") ?>
    <link rel="stylesheet" href="<?= base_url("/assets/css/home.css") ?>">
<?= $this->endSection() ?>

<?= $this->section("main") ?>
    <div id="content">
        <div id="search">
            <form action="" method="get">
                <div>
                    <label for="type" id="type">Type de match</label>
                    <select name="type" class="search-input">
                        <option value="">Tous</option>
                        <option value="1vs1">1vs1</option>
                        <option value="2vs2">2vs2</option>
                        <option value="3vs3">3vs3</option>
                    </select>
                </div>
                <div>
                    <label for="search">Recherche</label>
                    <input type="text" name="search" placeholder="Equipe, joueur..." class="search-input" id="search">
                </div>
            </form>
        </div>
        <hr>
        <div id="matches">
            <div class="match"></div>
            <div class="match"></div>
            <div class="match"></div>
            <div class="match"></div>
            <div class="match"></div>
            <div class="match"></div>
            <div class="match"></div>
            <div class="match"></div>
        </div>
    </div>
<?= $this->endSection() ?>
