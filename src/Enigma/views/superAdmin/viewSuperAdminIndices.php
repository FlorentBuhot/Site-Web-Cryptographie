<head>
    <?php global $dir, $js, $style, $image, $enigmes; ?>
    <!-- CSS de la page -->
    <link href="<?= $dir . $style['classement'] ?>" rel="stylesheet">
    <link href="<?= $dir . $style['admin'] ?>" rel="stylesheet">


    <link rel="icon" type="image/icon" href="<?= $dir . $image['onglet'] ?>"/>


    <!-- Titre de la page-->
    <title><?= $t ?></title>
</head>

<?php $this->_t = "gestion des indices"; ?>


<main class="select">
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
    <form action="" method="post" id="formSelect">
        <label>
            <select name="choix" class="choix_enigme" onchange="sendSelect();">
                <?php foreach ($enigmes as $enigme): ?>
                    <?php if ($enigme[0] == $selected): ?>
                        <option value="<?= $enigme[0] ?>" selected><?= $enigme[1] ?></option>
                    <?php else: ?>
                        <option value="<?= $enigme[0] ?>"><?= $enigme[1] ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
        </label>
        <input type="hidden" name="action" value="choixIndice"/>
    </form>

    <div class="box" style="margin-top: 8%">
        <div class="element">
            <p></p>
            <form method="post">
                <label for="indice1">Indice n°1 : </label>
                <div>
                    <textarea rows="5" name="indice1" id="indice1"><?= $indices[0]->getContenu(); ?></textarea>
                </div>
                <label for="indice2">Indice n°2 : </label>
                <div>
                    <textarea rows="5" name="indice2" id="indice1"><?= $indices[1]->getContenu(); ?></textarea>
                </div>
                <label for="indice3">Indice n°3 : </label>
                <div>
                    <textarea rows="5" name="indice3" id="indice1"><?= $indices[2]->getContenu(); ?></textarea>
                </div>
                <button type="submit">Modifier</button>
                <input type="hidden" name="selected" value="<?= $selected ?>">
                <input type="hidden" name="selectedNiveau" value="<?= $selectedNiveau ?>">
                <input type="hidden" name="action" value="formModifIndice">
            </form>
        </div>

    </div>
</main>

<script type="text/javascript" src="<?= $dir . $js['sendForm'] ?>"></script>