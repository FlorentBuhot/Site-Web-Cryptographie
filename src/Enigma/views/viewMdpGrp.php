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

<?php $this->_t = "réinitialiser le mot de passe"; ?>

<main>
    <div class="box">
        <h1 class="titre">Réinitialisation du mot de passe du groupe</h1>
        <form method="post">
            <div class="element">
                <label for="email">Veuillez saisir votre nouveau mot de passe</label>
                <input type="password" id="password" name="txtMdp">
                <input type="hidden" name="txtGroupe" value="<?= $groupe; ?>">
                <input type="hidden" name="txtPseudo" value="<?= $pseudo; ?>">
            </div>
            <div class="element">
                <label for="email">Veuillez confirmer votre nouveau mot de passe</label>
                <input type="password" id="password" name="txtMdpConfirm">
            </div>
            <button type="submit">Valider</button>
            <input type="hidden" name="action" value="formMdpGrp">
        </form>
        <p>Vous avez déjà un compte ? <a href="?url=connexion">Connectez-vous !</a></p>
        <p>Pas de compte ? <a href="?url=inscription">Inscrivez vous !</a></p>
        <p>Retour à <a href="?url=pagePrincipale">l'accueil</a></p>
    </div>
</main><?php
