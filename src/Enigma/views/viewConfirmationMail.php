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

<?php $this->_t = "ConfirmationMail"; ?>

<div class="affSuccess">
    <h2 class="success">Confirmation par mail</h2>
    <p>
        Votre inscription est réussite veuillez maintenant activer votre compte en cliquant sur le lien envoyé par mail.
    </p>
</div>
