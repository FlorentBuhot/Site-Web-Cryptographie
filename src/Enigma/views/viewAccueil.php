<!doctype html>
<html lang="fr" xmlns="http://www.w3.org/1999/html">
<head>
    <?php global $dir, $style, $image; ?>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS de la page -->
    <link rel="stylesheet" href="<?= $dir . $style['accueil'] ?>">
    <link rel="icon" type="image/icon" href="<?= $dir . $image['onglet'] ?>"/>

    <!-- Titre de la page-->
    <title><?= $t ?></title>
</head>

<?php $this->_t = "Mission Crypto"; ?>
<body>
<main class="center-content">
    <h1>Mission Crypto</h1>
    <h2>Venez découvrir le monde de la cryptographie !</h2>
    <p>Vous trouverez sur ce site une liste de différentes énigmes à résoudre. Chacune des énigmes dispose de 3 niveaux
        de difficulté différents !</p>
    <p>Sur chacun de ces niveaux, lorsque vous résolvez un niveau, vous recevez des points, qui vous permettront de
        débloquer des indices.</p>
    <a href="?url=pagePrincipale">
        <button class="visite-btn" id="visite">Bon jeu !</button>
    </a>
</main>
</body>