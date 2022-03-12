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

<?php $this->_t = "Groupe : " . $groupe[0]->getNomGroupe(); ?>


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
        <h1>Page de groupe</h1>
        <div class="element">
            <label>Nom du groupe : </label>
            <label class="perso"><?= $groupe[0]->getNomGroupe(); ?></label>
        </div>
        <div class="element">
            <label>Nom du chef de groupe : </label>
            <label class="perso"><?= $groupe[0]->getPseudoChef(); ?></label>
        </div>
        <hr>
        <div class="element">
            <p>Supprimez le groupe :</p>
            <form method="post" onsubmit="return confirm('Voulez-vous vraiment supprimer le groupe ?');">
                <div>
                    <label for="mdp" class="perso">Laissez le mot de passe :</label>
                    <div>
                        <input type="password" id="mdp" name="txtMdpGrp" required>
                    </div>
                    <label for="mdpConfirm" class="perso">Ressaisissez le mot de passe :</label>
                    <div>
                        <input type="password" id="mdpConfirm" name="txtMdpConfirmGrp" required>
                    </div>
                    <button type="submit" name="valider">Supprimer</button>
                    <input type="hidden" name="action" value="formulaireSuppGrp">
                </div>
            </form>
        </div>
        <hr>
        <div class="element">
            <p>Réinitialiser le mot de passe du groupe :</p>
            <form method="post" onsubmit="return confirm('Voulez vous vraiment modifier votre mot de passe ?')">
                <input type="hidden" name="nomGroupe" value="<?= $groupe[0]->getNomGroupe() ?>">
                <div>
                    <button type="submit">Réinitialiser</button>
                    <input type="hidden" name="action" value="formulaireReinitMdpGrp">
                </div>
            </form>
        </div>
        <hr>
        <div class="element">
            <p>Membres du groupe :</p>
        </div>
        <?php foreach ($members as $member) : ?>
            <table>
                <tr>
                    <td>
                        <label class="perso">membre : </label><?= $member['pseudo'] ?>
                    </td>
                    <td>
                        <form method="post" onsubmit="return confirm('Voulez vous vraiment exclure cet utilisateur ?')">
                            <button type="submit">Exclure l'utilisateur</button>
                            <input type="hidden" name="username" value="<?= $member['pseudo'] ?>">
                            <input type="hidden" name="action" value="formulaireExclureUserGrp">
                        </form>
                    </td>
                </tr>
            </table>
        <?php endforeach; ?>
    </div>
</main>