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
        <div class="card password">
            <div class="title">
                Mot de passe
            </div>
            <div class="content">
                <input type="password" placeholder="Mot de passe actuel">
                <input type="password" placeholder="Nouveau mot de passe">
                <input type="password" placeholder="Confirmer le mot de passe">
                <input type="button" value="Modifier">
            </div>
        </div>
        <div class="card">

        </div>
        <div class="card">

        </div>
    </div>
</div>
<?= $this->endSection() ?>
