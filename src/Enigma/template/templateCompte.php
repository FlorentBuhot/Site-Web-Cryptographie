<!doctype html>
<html lang="fr" xmlns="http://www.w3.org/1999/html">
<head>
    <?php global $dir, $style, $image; ?>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font awesome (pour les icons)-->
    <script src="https://kit.fontawesome.com/5e859a4d38.js" crossorigin="anonymous"></script>

    <!-- CSS de la page -->
    <link type="text/css" rel="stylesheet" href="<?= $dir . $style['menu'] ?>"/>
    <link rel="stylesheet" href="<?= $dir . $style['footer'] ?>">
    <link rel="icon" type="image/icon" href="<?= $dir . $image['onglet'] ?>"/>
    <link rel="stylesheet" href="<?= $dir . $style['compte'] ?>">
    <link type="text/css" rel="stylesheet" href="<?= $dir . $style['adaptation'] ?>"/>
    <meta charset="utf-8">

    <!-- Titre de la page-->
    <title><?= $t ?></title>
</head>
<header>
    <button id="deroulant" onclick="derouler();">
        <i class="fas fa-bars menu-adapt"></i>
    </button>

    <a href="?url=accueil" class="logo">Mission Crypto</a>

    <nav>
        <ul class="nav_links">
            <div class="centrale">
                <li><a href="?url=pagePrincipale"><i class="far fa-list-alt"></i>Énigmes</a></li>
                <li><a href="?url=leaderboardEnigme"><i class="fas fa-trophy"></i>Classement</a>
            </div>
        </ul>
    </nav>
</header>


<div class="contentPhp">
    <?= $content ?>
</div>


<script>
    let actu = 0;

    function derouler() {
        let menu_deroulant;
        if (actu === 0) {
            menu_deroulant = document.querySelector('nav');
            menu_deroulant.classList.add('active');
            actu = 1;
        } else {
            menu_deroulant = document.querySelector('nav');
            menu_deroulant.classList.remove('active');
            actu = 0;
        }

    }
</script>

<footer class="n2f">
    <p>&copy Développé par William Fontaine, Léopold Lapendéry, Florent Buhot, Loris Regnier et Maël Goareguer.</p>
</footer>

</html>