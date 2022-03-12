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
<?php $this->_t = "Inscription"; ?>


<div class="affErreur">
    <?php if (isset($dVueErreur)): ?>
        <h2 class="erreur">Erreur</h2>
        <?php foreach ((array)$dVueErreur as $erreur): ?>
            <p>
                <?= $erreur ?>
            </p>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
<div class="affSuccess">
    <?php if (isset($dVueSuccess)): ?>
        <h2 class="success">Succès</h2>
        <?php foreach ((array)$dVueSuccess as $success): ?>
            <p>
                <?= $success ?>
            </p>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<main>
    <div class="box">

        <h1 class="titre">Inscription</h1>

        <form method="post">
            <div class="element">
                <label for="nom">Pseudo</label>
                <input type="text" name="txtNom" id="nom" placeholder="Saisir un pseudo" required/>
            </div>
            <div class="element">
                <label for="mail">Email</label>
                <input name="txtEmail" id="mail" placeholder="Saisir un email" required/>
            </div>
            <div class="element">
                <label for="password1">Mot de passe</label>
                <input type="password" name="txtMdp" id="password1" placeholder="Saisir un mot de passe" required/>
            </div>
            <div class="element">
                <label for="password2">Confirmation du mot de passe</label>
                <input type="password" name="txtMdpConfirm" id="password2"
                       placeholder="Saisir à nouveau le mot de passe" required/>
            </div>
            <button type="submit">Inscription</button>
            <input type="hidden" name="action" value="formInscription">
        </form>
        <?php if (isset($dVueErreur)): ?>
            <?php foreach ((array)$dVueErreur as $erreur): ?>
                <p>
                    <?= $erreur ?>
                </p>
            <?php endforeach; ?>
        <?php endif; ?>
        <p>Vous avez déjà un compte ? <a href="?url=connexion">Connectez-vous !</a></p>
        <p>Retour à <a href="?url=pagePrincipale">l'accueil</a></p>
    </div>

</main>
