<head>
    <?php global $dir, $js, $style, $image; ?>

    <!-- CSS de la page -->
    <link href="<?= $dir . $style['admin'] ?>" rel="stylesheet">

    <!-- Font awesome (pour les icons)-->
    <link rel="icon" type="image/icon" href="<?= $dir . $image['onglet'] ?>"/>

    <script type="text/javascript" src="<?= $dir . $js['popup'] ?>"></script>

    <!-- Titre de la page-->
    <title><?= $t ?></title>
</head>

<?php $this->_t = "page de super utilisateur"; ?>

<main>
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

    <div class="box">
        <h1>Informations personnelles</h1>
        <div class="element">
            <label>Nom d'utilisateur : </label>
            <label class="perso"><?= $user[0]->getPseudo(); ?></label>
        </div>
        <hr>
        <div class="element">
            <label>Email : </label>
            <label class="perso"><?= $user[0]->getMail(); ?></label>
        </div>
        <hr>
        <div class="element">
            <label>Mot de passe :</label>
            <label class="perso">Le mot de passe n'est pas affiché.</label>
        </div>
        <hr>
        <div class="element">
            <label>Droits :</label>
            <label class="perso"><?= $user[0]->getType(); ?></label>
        </div>
        <hr>
        <div class="element">
            <label>Nombre de point(s) : </label>
            <label class="perso"><?= $user[0]->getPoints(); ?> point(s)</label>
        </div>
        <hr>
        <div class="element">
            <p>Image de profil :</p>
            <form method="post" onsubmit="return confirm('Voulez vous changer votre image de profil ?')"
                  enctype="multipart/form-data">
                <label for="avatar" class="perso">Choisissez une image de profil :<br>(Taille maximale : 2Mo , format :
                    'jpg', 'jpeg', 'png' et 'jfif')</label>
                <div>
                    <input type="file" id="avatar" name="avatar"
                           accept=".jpg, .jpeg, .png, .jfif" required>
                </div>
                <button type="submit">Changer</button>
                <input type="hidden" name="action" value="formulaireImageProfil">
            </form>
        </div>
        <?php if (Nettoyage::clearString($_SESSION['imgProfil'] !== null)) : ?>
            <hr>
            <div class='element'>
                <p>Supprimez votre image de profil :</p>
                <form method='post'
                      onsubmit="return confirm(' Voulez vous vraiment supprimer votre image de profil ?')">
                    <div class="element">
                        <label class="perso">Aperçu :</label>
                        <div>
                            <img class="img"
                                 src="<?= $dir ?>dist/image/<?= Nettoyage::clearString($_SESSION['imgProfil']) ?>"
                                 alt="Image de profil">
                        </div>
                    </div>
                    <button type='submit'>Supprimer</button>
                    <input type='hidden' name='action' value='formulaireSuppImageProfil'>
                </form>
            </div>
        <?php endif; ?>
        <hr>
        <div class="element">
            <p>Modifiez votre mot de passe :</p>
            <form method="post" onsubmit="return confirm('Voulez vous vraiment modifier votre mot de passe ?')">
                <label for="mdpAtu" class="perso">Saisissez votre mot de passe actuel :</label>
                <div>
                    <input type="password" id="mdpAtu" name="txtMdpActuel" required>
                </div>
                <label for="mdp" class="perso">Saisissez votre nouveau mot de passe :</label>
                <div>
                    <input type="password" id="mdp" name="txtMdp" required>
                </div>
                <label for="mdpConfirm" class="perso">Ressaisissez votre nouveau mot de passe :</label>
                <div>
                    <input type="password" id="mdpConfirm" name="txtMdpConfirm" required>
                </div>
                <div>
                    <button type="submit">Modifier</button>
                    <input type="hidden" name="action" value="formulaireChangeMdp">
                </div>
            </form>
        </div>
        <hr>
        <div class="element" onsubmit="return confirm('Voulez-vous vraiment supprimer votre compte ?');">
            <p>Supprimez votre compte :</p>
            <form method="post">
                <div>
                    <label for="mdp" class="perso">Saisissez votre mot de passe :</label>
                    <div>
                        <input type="password" id="mdp" name="txtMdp" required>
                    </div>
                    <label for="mdpConfirm" class="perso">Ressaisissez votre mot de passe :</label>
                    <div>
                        <input type="password" id="mdpConfirm" name="txtMdpConfirm" required>
                    </div>
                    <button type="submit" name="valider">Supprimer</button>
                    <input type="hidden" name="action" value="formulaireSuppCompte">
                </div>
            </form>
        </div>
    </div>
</main>
