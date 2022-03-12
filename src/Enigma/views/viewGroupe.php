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
    <div class="box">
        <h1>Page du groupe : <?= $groupe[0]->getNomGroupe() ?>(créé par <?= $groupe[0]->getPseudoChef() ?>)</h1>
        <div class="element">
            <p>Quitter le groupe : </p>
            <form method="post" onsubmit="return confirm('Voulez-vous vraiment quitter le groupe ?');">
                <button type="submit" name="valider">Quitter</button>
                <input type="hidden" name="action" value="formulaireQuitterGrp">
            </form>
        </div>
        <hr>
        <div class="element">
            <p>Liste des membres : </p>
        </div>
        <?php foreach ($members as $member) : ?>
            <table>
                <tr>
                    <td>
                        <label class="perso">pseudo : </label><?= $member['pseudo'] ?>
                    </td>
                </tr>
            </table>
        <?php endforeach; ?>
    </div>
</main>
