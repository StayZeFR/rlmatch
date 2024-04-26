<?= $this->extend("_pattern") ?>

<?= $this->section("assets") ?>
    <link rel="stylesheet" href="<?= base_url("/assets/css/home.css") ?>">
    <script src="<?= base_url("/assets/js/home.js") ?>"></script>
<?= $this->endSection() ?>

<?= $this->section("main") ?>
    <div id="content">
        <div class="header">
            <form action="" method="get">
                <div>
                    <label for="type" class="search-label">Type de match</label>
                    <select name="type" id="type" class="search-input">
                        <option value="">Tous</option>
                        <option value="1vs1">1vs1</option>
                        <option value="2vs2">2vs2</option>
                        <option value="3vs3">3vs3</option>
                    </select>
                </div>
                <div>
                    <label for="search" class="search-label">Recherche</label>
                    <input type="text" name="search" placeholder="Equipe, joueur..." id="search" class="search-input">
                </div>
            </form>
        </div>
        <hr>
        <div class="matches">
            <!--<div class="match"></div>
            <div class="match"></div>
            <div class="match"></div>
            <div class="match"></div>
            <div class="match"></div>
            <div class="match"></div>
            <div class="match"></div>
            <div class="match"></div>
            <div class="match"></div>
            <div class="match"></div>
            <div class="match"></div>
            <div class="match"></div>-->
        </div>
        <div class="footer">
            <div class="paging"><button class="previous"><img src="/assets/images/previous.png" alt=""></button><span>1 / N</span><button class="next"><img src="/assets/images/next.png" alt=""></button></div>
        </div>
    </div>
<?= $this->endSection() ?>
