<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RLMatch</title>
    <link rel="stylesheet" href="<?= base_url("/assets/css/auth/register.css") ?>">
</head>
<body>
<div id="container">
    <a href="<?= url_to("home") ?>" class="return">
        <img src="<?= base_url("/assets/images/return.png") ?>" alt="">
        <div>Retour</div>
    </a>
    <h1>Inscription</h1>
    <form action="/login" method="post">
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
        </div>
        <div>
            <label for="pseudo">Pseudo (Epic Games)</label>
            <input type="text" name="pseudo" id="pseudo">
        </div>
        <div>
            <label for="last-name">Nom</label>
            <input type="text" name="last-name" id="last-name">
        </div>
        <div>
            <label for="first-name">Prénom</label>
            <input type="text" name="first-name" id="first-name">
        </div>
        <div>
            <label for="birthday">Date de naissance</label>
            <input type="date" name="birthday" id="birthday">
        </div>
        <div>
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password">
        </div>
        <button type="submit">S'incrire</button>
    </form>
</div>
</body>
</html>