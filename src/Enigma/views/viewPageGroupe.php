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

<?php $this->_t = "Vos groupes" ?>

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
        <h1>Gestion de vos groupes</h1>
        <div class="element">
            <p>Rejoindre un groupe :</p>
            <form method="post">
                <label for="nameGrp" class="perso">Saisissez le nom du groupe :</label>
                <div>
                    <input type="text" id="nameGrp" name="nameGrp" required>
                </div>
                <label for="chefGrp" class="perso">Saisissez le pseudo du créateur du groupe :</label>
                <div>
                    <input type="text" id="chefGrp" name="chefGrp" required>
                </div>
                <label for="mdpGrp" class="perso">Saisissez le mot de passe du groupe :</label>
                <div>
                    <input type="password" id="mdpGrp" name="mdpGrp" required>
                </div>
                <button type="submit">Rejoindre</button>
                <input type="hidden" name="action" value="formulaireRejoindreGroupe">
            </form>
        </div>
        <?php if ($myGroups != null) : ?>
            <hr>
            <div class="element">
                <p>Groupes auxquels vous appartenez : </p><label class="perso">Cliquez sur le nom du groupe pour accéder
                    à sa page de
                    personalisation.</label>
            </div>
            <?php foreach ($myGroups as $groups) : ?>
                <div class="element">
                    <label class="perso">Groupe :</label><a
                            href="?url=groupe&id=<?= $groups['nomGroupe'] ?>&chef=<?= $groups['pseudoChef'] ?>"><?= $groups['nomGroupe'] ?>
                        (créé par <?= $groups['pseudoChef'] ?>)</a>
                </div>
            <?php endforeach; ?>
            <hr>
        <?php endif; ?>
    </div>
</main>
