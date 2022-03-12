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

<?php $this->_t = "Connexion"; ?>

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
        <h1 class="titre">Connexion</h1>
        <form method="post">
            <div class="element">
                <label for="nom">Pseudo</label>
                <input id="nom" type="text" name="txtNom" required/>
            </div>
            <div class="element">
                <label for="password">Mot de passe</label>
                <input id="password" type="password" name="txtMdp" required/>
            </div>
            <button type="submit">Connexion</button>
            <input type="hidden" name="action" value="formConnexionPseudo">
        </form>
        <p>Vous avez oublié votre mot de passe ? <a href="?url=reinitMdp">Le réinitialiser !</a></p>
        <p>Pas de compte ? <a href="?url=inscription">Inscrivez vous !</a></p>
        <p>Retour à <a href="?url=pagePrincipale">l'accueil</a></p>
    </div>
</main>