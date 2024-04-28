<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RLMatch</title>
    <link rel="stylesheet" href="/assets/css/auth/login.css">
</head>
<body>
    <div id="container">
        <a href="<?= url_to("home") ?>" class="return">
            <img src="<?= base_url("/assets/images/return.png") ?>" alt="">
            <div>Retour</div>
        </a>
        <h1>Connexion</h1>
        <form action="/login" method="post">
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" id="email">
            </div>
            <div>
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password">
            </div>
            <button type="submit">Se connecter</button>
        </form>
        <div class="separation">
            <div class="separator-line"></div>
            <div class="separator-text">OU</div>
            <div class="separator-line"></div>
        </div>
        <div class="social">
            <a href=""><div><img src="<?= base_url("/assets/images/epicgames.png") ?>" alt=""><div>Epic games</div></div></a>
        </div>
    </div>
</body>
</html>