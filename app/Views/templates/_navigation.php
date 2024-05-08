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
        <?php if (!session()->has("player")) { ?>
            <div class="auth">
                <img src="<?= base_url("/assets/images/epicgames.png") ?>" alt="">
                <div>Se connecter avec Epic Games</div>
            </div>
        <?php } else { ?>
            <div class="profile">
                <a href="<?= url_to("account.token") ?>" class="token">
                    <span><?= session()->get("player")["token"] ?></span>
                    <img src="<?= base_url("/assets/images/token.png") ?>" alt="">
                </a>
                <div class="friend">
                    <img src="<?= base_url("/assets/images/friend.png") ?>" alt="">
                    <div></div>
                </div>
                <div class="notification">
                    <img src="<?= base_url("/assets/images/notification.png") ?>" alt="">
                </div>
                <div class="picture">
                    <img src="<?= base_url("/assets/images/user.png") ?>" alt="">
                    <div class="dropdown-navigation">
                        <div>
                            <h3><?= session()->get("player")["username"] ?></h3>
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

<?php if (session()->has("player")) { ?>
    <div id="notification">
        <div class="notification-content">
            <div class="notification-header">
                <h3>Notifications</h3>
                <button class="close-notification"><img src="<?= base_url("/assets/images/close.png") ?>" alt=""></button>
            </div>
            <div class="notification-list">

                <div class="notification-item">
                    <img src="/assets/images/user.png" alt="">
                    <div class="content">
                        <h4>John Doe</h4>
                        <p>Vous a ajouté en ami</p>
                    </div>
                    <div class="action">
                        <button class="valid">
                            <img src="<?= base_url("/assets/images/valid.png") ?>" alt="">
                        </button>
                        <button class="decline">
                            <img src="<?= base_url("/assets/images/close.png") ?>" alt="">
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div id="friend">
        <div class="friend-content">
            <div class="friend-header">
                <h3>Amis</h3>
                <button class="close-friend"><img src="<?= base_url("/assets/images/close.png") ?>" alt=""></button>
            </div>
            <div class="friend-tab">
                <button class="friend-tab-item list-friend active">
                    <img src="<?= base_url("/assets/images/friend.png") ?>" alt="">
                </button>
                <button class="friend-tab-item add-friend">
                    <img src="<?= base_url("/assets/images/addFriend.png") ?>" alt="">
                </button>
            </div>
            <div class="friend-list">

                <div class="friend-item">
                    <img src="/assets/images/user.png" alt="">
                    <div class="content">
                        <h4>John Doe</h4>
                    </div>
                </div>

            </div>
            <div class="friend-add">
                <div class="add">
                    <h4>Ajouter un ami</h4>
                    <div>
                        <input type="text" placeholder="Pseudo..." class="add-friend-input">
                        <button class="add-friend-button">
                            <img src="<?= base_url("/assets/images/plus.png") ?>" alt="">
                        </button>
                    </div>
                </div>
                <div class="request">
                    <h4>Liste des demandes</h4>
                    <div class="request-list">

                        <!--<div class="request-item">
                            <img src="/assets/images/user.png" alt="">
                            <div class="content">
                                <h4>John Doe</h4>
                            </div>
                            <div class="action">
                                <button class="valid">
                                    <img src="<?= base_url("/assets/images/valid.png") ?>" alt="">
                                </button>
                                <button class="decline">
                                    <img src="<?= base_url("/assets/images/close.png") ?>" alt="">
                                </button>
                            </div>
                        </div>-->

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>