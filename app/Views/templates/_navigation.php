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
        <?php if (!session()->has("user")) { ?>
            <div class="auth">
                <img src="<?= base_url("/assets/images/epicgames.png") ?>" alt="">
                <div>Se connecter avec Epic Games</div>
            </div>
        <?php } else { ?>
            <div class="profile">
                <a href="<?= url_to("account.token") ?>" class="token">
                    <span>1000</span>
                    <img src="<?= base_url("/assets/images/token.png") ?>" alt="">
                </a>
                <div class="picture">
                    <img src="<?= base_url("/assets/images/user.png") ?>" alt="">
                    <div class="dropdown-navigation">
                        <div>
                            <h3><?= session()->get("user")->getUsername() ?></h3>
                            <hr>
                            <ul>
                                <li><a href="<?= url_to("account.account") ?>">Mon compte</a></li>
                                <li><a href="<?= url_to("account.games") ?>">Mes parties</a></li>
                                <li><a href="<?= url_to("logout") ?>">Déconnexion</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <button class="menu-icon"><img src="/assets/images/menu.png" alt=""></button>
    </div>
</nav>
