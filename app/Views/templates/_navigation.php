<nav id="navigation">
    <div class="nav-icon">
        <img src="<?= base_url("/assets/images/logo.png") ?>" alt="">
    </div>
    <div class="nav-menu">
        <ul>
            <li><a href="<?= url_to("home") ?>">Accueil</a></li>
            <li><a href="<?= url_to("play") ?>">Jouer</a></li>
            <li><a href="">Contact</a></li>
        </ul>
    </div>
    <div class="nav-action">
        <div class="auth">
            <!--<a class="login" href="<?= url_to("login") ?>">Connexion</a>
            <a class="register" href="">Inscription</a>-->
            <img src="<?= base_url("/assets/images/epicgames.png") ?>" alt="">
            <div>Se connecter avec Epic Games</div>
        </div>
        <button class="menu-icon"><img src="/assets/images/menu.png" alt=""></button>
    </div>
</nav>