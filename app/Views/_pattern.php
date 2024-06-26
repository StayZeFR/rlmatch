<?php

use App\Models\AuthModel;

$url = "";
if (!session()->has("user") && !session()->has("token")) {
    $url = AuthModel::getUrl();
    session()->set("state", AuthModel::getState());
}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RLMatch</title>
    <script src="<?= base_url("/assets/libs/jquery.min.js") ?>"></script>
    <script src="<?= base_url("/assets/libs/sweetalert/sweetalert2.all.min.js") ?>"></script>
    <script src="<?= base_url("/assets/js/global.js") ?>"></script>
    <script src="<?= base_url("/assets/js/navigation.js") ?>"></script>
    <script src="<?= base_url("/assets/js/auth.js") ?>"></script>
    <link rel="stylesheet" href="<?= base_url("/assets/css/navigation.css") ?>">
    <link rel="stylesheet" href="<?= base_url("/assets/css/style.css") ?>">
    <link rel="stylesheet" href="<?= base_url("/assets/libs/sweetalert/sweetalert2.min.css") ?>">
    <?= $this->renderSection("assets") ?>
    <?php
        if (session()->has("player") && session()->has("token")) {
            echo "<script src='" . base_url("/assets/js/notification.js") . "'></script>";
            echo "<script src='" . base_url("/assets/js/friend.js") . "'></script>";
        }
    ?>
    <script>
        const URL_AUTH = "<?= $url ?>";
    </script>
</head>
<body>
    <?= $this->include("templates/_navigation") ?>
    <?= $this->renderSection("main") ?>
</body>
</html>