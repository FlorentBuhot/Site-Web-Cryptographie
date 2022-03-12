<head>
    <?php global $dir, $style, $image, $js, $enigme; ?>

    <!-- CSS de la page -->
    <link rel="stylesheet" href="<?= $dir . $style['enigme'] ?>">
    <link type="text/css" rel="stylesheet" href="<?= $dir . $style['adaptation'] ?>"/>
    <!-- Font awesome (pour les icons)-->
    <script src="https://kit.fontawesome.com/5e859a4d38.js" crossorigin="anonymous"></script>
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    <!-- Titre de la page-->
    <title><?= $t ?></title>
</head>

<?php $this->_t = "Méli-mélo de caractères"; ?>

<a id="haut"></a>
<main>
    <div class="title-img-container">
        <img class="img" src="<?= $dir . $image['etoileBlanche'] ?>" alt="etoile de difficulté">
        <h1 class="titre" id="titre"><?= $this->_t ?></h1>
    </div>

    <?php if (isset($_SESSION['username'])) {
        foreach ($temps as $t): ?>
            <?php if ($t->getDifficulte() == 1) {
                $un = $t->getTemps();
            } ?>
            <?php if ($t->getDifficulte() == 2) {
                $deux = $t->getTemps();
            } ?>
            <?php if ($t->getDifficulte() == 3) {
                $trois = $t->getTemps();
            } ?>
        <?php endforeach;
    } ?>

    <?php if (isset($_SESSION['username'])) {
    if (!isset($un)) { ?>
        <script>let lvl = 1;</script>
    <?php } elseif (!isset($deux)) { ?>
        <script>let lvl = 2;</script>
    <?php } elseif (!isset($trois)) { ?>
        <script>let lvl = 3;</script>
    <?php } else { ?>
        <script>let lvl = 1;</script>
    <?php } ?>
    <?php } else{ ?>
        <script>let lvl = 1;</script>
    <?php } ?>

    <div class="diff-container">

        <div class="container_1">
            <a class="diff-element diff_1"><i class='bx bxs-key'></i></a>
            <?php if (isset($_SESSION['username'])) { ?>
                <p class="temps_1">
                    <?php if (isset($un)) {
                        echo "Meilleur temps: " . $un;
                    } else {
                        echo "Pas encore de record";
                    } ?>
                </p>
            <?php } ?>
        </div>

        <div class="container_2">
            <a class="diff-element diff_2">
                <i class='bx bxs-key'></i>
                <i class='bx bxs-key'></i>
            </a>
            <?php if (isset($_SESSION['username'])) { ?>
                <p class="temps_2">
                    <?php if (isset($deux)) {
                        echo "Meilleur temps: " . $deux;
                    } else {
                        echo "Pas encore de record";
                    } ?>
                </p>
            <?php } ?>
        </div>

        <div class="container_3">
            <a class="diff-element diff_3">

                <i class='bx bxs-key'></i>
                <i class='bx bxs-key'></i>
                <i class='bx bxs-key'></i>

            </a>
            <?php if (isset($_SESSION['username'])) { ?>
                <p class="temps_3">
                    <?php if (isset($trois)) {
                        echo "Meilleur temps: " . $trois;
                    } else {
                        echo "Pas encore de record";
                    } ?>
                </p>
            <?php } ?>
        </div>

    </div>

    <div class="element_section">

        <div id="cont_eni">

            <div class="main_box">

                <p>
                    <span id="contenuePage" style="overflow-wrap: anywhere;"></span>
                </p>

            </div>
            <br>
            <hr>
            <div class="rep_box">

                <h2 class="center" id="questionRep"></h2>

                <form name="reponse">
                    <label>
                        <textarea id="box" name="box"></textarea>
                    </label>

                    <div class="zone-btn">
                        <a href="#haut" class="btn-grad">
                            <input id="reponse" type="button" value="Valider" onclick="solution();"/>
                        </a>
                        <input class="btn-grad" type="reset" value="Effacer"/>
                    </div>

                </form>

            </div>

        </div>

    </div>

    </div>

</main>

<div class="option_enigme">
    <button id="blocnote_button" class="choix" type="buttonI" onclick="display_blocNote();">
        <i class="fas fa-book"></i>
    </button>
    <button id="indice_button" class="choix" type="buttonI" onclick="toggle_textI();">
        <i class="far fa-question-circle"></i>
    </button>
</div>

<div id="cont_ind" class="indice_box">

    <button class="retourI" type="buttonI" onclick="toggle_retourI();"><i class="fas fa-times"></i></button>
    <?php if (isset($user)): ?>
        <p class="points">Vous avez <span id="userPoints"><?= $user->getPoints() ?></span> point(s).</p>
    <?php endif; ?>
    <?php if (isset($user)) {
        $co = "Aucun indice découvert.";
    } else {
        $co = "Les indices sont disponibles uniquement pour les joueurs connectés.";
    } ?>
    <p id='base'><?= $co ?></p>
    <?php if (isset($user)): ?>
        <div class="main_box">

            <span id="id1"><?= $indices[0]->getContenu() ?><hr></span>
            <span id="id2"><?= $indices[1]->getContenu() ?><hr></span>
            <span id="id3"><?= $indices[2]->getContenu() ?><hr></span>

            <button id='btnIndice' class="btn-ind" type="button" onclick="sendPoints();" form="formReponse">Découvrir un
                nouvel indice<br> (-<span id="points">250</span> points)
            </button>
        </div>
    <?php endif; ?>
</div>

<div id="cont_blocnote" class="bloc_box">

    <button class="retourBN" onclick="toggle_retourBN();"><i class="fas fa-times"></i></button>

    <textarea></textarea>

</div>

<div class="zone_valid">

    <div class="validation">
        <i class="fas fa-check"></i>
    </div>
    <div class="fenetre-suite">

        <h2>Vous avez réussi !</h2>

        <p>Vous pouvez aller au niveau suivant ou revenir au menu pour faire une nouvelle énigme.</p>

        <div class="annonce">
            <i class="fas fa-award"></i>
            <p id="time">Félicitations ! Vous avez accompli ce niveau en : x secondes.</p>
        </div>

        <div class="bouton-container">

            <button class="menu2" onclick="sendReponseMenu();">
                Liste des énigmes
            </button>

            <?php if (isset($_SESSION['username'])) { ?>

                <button class="suivant" onclick="sendReponse();">
                    suivant
                </button>

            <?php } ?>

        </div>

    </div>

    <div class="rejouer">
        <i class="fas fa-times"></i>
    </div>
    <div class="fenetre-rejouer">

        <button class="quitter" onclick="closeCont()">
            <i class="fas fa-times"></i>
        </button>

        <h2>Mauvaise réponse</h2>

        <p>Vous pouvez rejouer ou aller à la liste des énigmes pour pouvoir en essayer une autre.</p>

        <div class="annonce_fail">
            <i class="far fa-times-circle"></i>
            <p>Dommage, vous avez peut-être oublié de répondre ou ce n'est pas la bonne réponse.</p>
        </div>

        <div class="bouton-container">
            <button class="annuler" onclick="closeCont();">Réessayer</button>
            <a href="?url=pagePrincipale" class="menu">
                Liste des énigmes
            </a>
        </div>

    </div>

</div>

<div class="zone_alert">
    <button class="quitterAlerte" onclick="closeAlert()">
        <i class="fas fa-times"></i>
    </button>
    <p>Cela fait plus de 5 minutes que vous êtes bloqué, il est conseillé d'utiliser les indices !</p>
</div>

<form method="post" id="formReponse">
    <input type="hidden" id="sendNiveau" name="niveau">
    <input type="hidden" id="sendClassement" name="time">
    <input type="hidden" name="enigme" value="melimelo">
    <input type="hidden" name="points" value="0">
    <?php if (isset($user)): ?>
        <input type="hidden" name="pointsJoueur" value="<?= $user->getPoints(); ?>">
    <?php endif; ?>
    <input type="hidden" name="action" value="formReussirEnigme">
</form>

<iframe name="content" style="display:none"></iframe>

<script type="text/javascript" src="<?= $dir . $js['indice'] ?>"></script>
<script type="text/javascript" src="<?= $dir . $js['sendForm'] ?>"></script>
<script type="text/javascript" src="<?= $dir . $js['timer'] ?>"></script>
<script type="text/javascript" src="<?= $dir . $js['contenu'] ?>"></script>
<script type="text/javascript" src="<?= $dir . $enigme['permutation'] ?>"></script>


