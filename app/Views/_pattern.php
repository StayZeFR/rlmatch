<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RLMatch</title>
    <script src="<?= base_url("/assets/libs/jquery.min.js") ?>"></script>
    <link rel="stylesheet" href="<?= base_url("/assets/css/navigation.css") ?>">
    <link rel="stylesheet" href="<?= base_url("/assets/css/style.css") ?>">
    <?= $this->renderSection("assets") ?>
</head>
<body>
    <?= $this->include("templates/_navigation") ?>
    <?= $this->renderSection("main") ?>
</body>
</html>