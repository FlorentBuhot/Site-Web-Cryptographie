<head>
    <?php global $dir, $style, $enigmes, $js ?>

    <!-- CSS de la page -->
    <link href="<?= $dir . $style['classement'] ?>" rel="stylesheet">

    <!-- Titre de la page-->
    <title><?= $t ?></title>
</head>

<?php $this->_t = "Leaderboard par énigme"; ?>

<main>
    <?php if (!isset($_SESSION["username"])) : ?>
        <h2 class="message"><i class="fas fa-exclamation-circle"></i> Votre classement apparaît ici uniquement si vous
            êtes connecté !</h2>
    <?php endif; ?>
    <div class="select">
        <form action="" method="post" id="formSelect">
            <?php if (isset($groups)) : ?>
                <label>
                    <select name="groupe" class="choix_enigme" onchange="sendSelect();">
                        <option value="none" selected>-- aucun groupe sélectionné --</option>
                        <?php foreach ($groups as $group) : ?>
                            <?php if ($group['nomGroupe'] == $selectedGroup): ?>
                                <option value="<?= $group['nomGroupe'] ?>" selected>groupe
                                    : <?= $group['nomGroupe'] ?></option>
                            <?php else : ?>
                                <option value="<?= $group['nomGroupe'] ?>">groupe : <?= $group['nomGroupe'] ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </label>
            <?php endif; ?>
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
            <label>
                <select name="niveau" class="choix_enigme" onchange="sendSelect();">
                    <?php foreach ([1, 2, 3] as $niveau): ?>
                        <?php if ($niveau == $selectedNiveau): ?>
                            <option value="<?= $niveau ?>" selected>Niveau <?= $niveau ?></option>
                        <?php else: ?>
                            <option value="<?= $niveau ?>">Niveau <?= $niveau ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </label>
            <input type="hidden" name="action" value="choixClassement"/>
        </form>
    </div>

    <div class="classement-container">
        <ul>
            <?php if (isset($classement)): ?>
                <?php foreach ($classement as $c): ?>
                    <div class="classement">
                        <li>
                            <div class="joueur_case">
                                <i class="fas fa-trophy"></i>
                            </div>
                            <p><?= $c->getPseudo(); ?></p>
                            <p class="score"><?= $c->getTemps(); ?></p>
                        </li>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="classement">
                    <p>Aucun joueur n'as réalisé cette énigme</p>
                </div>
            <?php endif; ?>
        </ul>
    </div>
</main>

<script type="text/javascript" src="<?= $dir . $js['sendForm'] ?>"></script>