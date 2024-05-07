<?= $this->extend("_pattern") ?>

<?= $this->section("assets") ?>
<link rel="stylesheet" href="<?= base_url("/assets/css/account.css") ?>">
<?= $this->endSection() ?>

<?= $this->section("main") ?>
<div id="content">
    <div class="title">
        Mon compte
    </div>
    <hr>
    <div class="container">
        <div class="card avatar">
            <div class="title">
                Avatar
            </div>
            <input type="button" class="btn" value="Changer">
        </div>
        <div class="card email">
            <div class="title">
                Email
            </div>
            <div class="content">
                <input type="email" placeholder="Email">
                <input type="button" class="btn" value="Changer">
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
