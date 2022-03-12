<!doctype html>
<html lang="fr" xmlns="http://www.w3.org/1999/html">
<head>
    <?php global $dir, $js, $style; ?>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS de la page -->
    <link rel="stylesheet" href="<?= $dir . $style['compte'] ?>">

    <!-- Titre de la page-->
    <title><?= $t ?></title>
</head>

<?php $this->_t = "Erreur"; ?>

<main class="box-error">
    <div class="box">
        <h1 class="titre">Une erreur est survenue !</h1>
        <div class="element">
            <p class="perso"><?= $errorMsg ?></p>
        </div>
    </div>
</main>