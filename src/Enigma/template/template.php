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
    <link rel="stylesheet" href="<?= $dir . $style['adaptation'] ?>">
    <link rel="icon" type="image/icon" href="<?= $dir . $image['onglet'] ?>"/>

    <!-- Titre de la page-->
    <title><?= $t ?></title>
</head>

<body>

<header>
    <button id="deroulant" onclick="derouler();">
        <i class="fas fa-bars menu-adapt"></i>
    </button>

    <a href="?url=accueil" class="logo">MISSION CRYPTO</a>
    <nav>
        <ul class="nav_links">
            <div class="centrale">
                <li><a href="?url=pagePrincipale"><i class="far fa-list-alt"></i>Énigmes</a></li>
                <li><a href="?url=leaderboardEnigme"><i class="fas fa-trophy"></i>Classement</a></li>
            </div>
            <?php if (isset($_SESSION['username'])) : ?>
                <li class="last-li">
                    <a class="profile"><?php if (Nettoyage::clearString($_SESSION['imgProfil'] === null)) : ?>
                            <i class='far fa-user'> </i>
                        <?php else : ?>
                            <img class="img-profil"
                                 src="<?= $dir ?>dist/image/<?= Nettoyage::clearString($_SESSION['imgProfil']) ?>"
                                 alt="Image de profil">
                        <?php endif; ?>
                        <?= $_SESSION['username'] ?></a>
                    <ul class="sous">
                        <?php if (Nettoyage::clearString($_SESSION['type']) == 'super-admin') : ?>
                            <li><a href="?url=pageSuperAdmin"><i class="fas fa-chevron-right"></i>Mon profil</a></li>
                            <li><a href="?url=pageGroupeAdmin"><i class="fas fa-chevron-right"></i>Mes groupes</a></li>
                            <li class="gestionUtiTexte"><a href="?url=gestionUtilisateurSA"><i
                                            class="fas fa-chevron-right"></i>Gestion des utilisateurs</a></li>
                            <li class="gestionUtiTexte"><a href="?url=gestionIndices"><i
                                            class="fas fa-chevron-right"></i>Gestion des indices</a></li>
                        <?php elseif (Nettoyage::clearString($_SESSION['type']) == 'admin') : ?>
                            <li><a href="?url=pageAdmin"><i class="fas fa-chevron-right"></i>Mon profil</a></li>
                            <li><a href="?url=pageGroupeAdmin"><i class="fas fa-chevron-right"></i>Mes groupes</a></li>
                            <li class="gestionUtiTexte"><a href="?url=gestionUtilisateurA"><i
                                            class="fas fa-chevron-right"></i>Gestion des utilisateur</a></li>
                        <?php elseif (Nettoyage::clearString($_SESSION['type']) == 'super-user') : ?>
                            <li><a href="?url=pageSuperUser"><i class="fas fa-chevron-right"></i>Mon profil</a></li>
                            <li><a href="?url=pageGroupeAdmin"><i class="fas fa-chevron-right"></i>Mes groupes</a></li>
                        <?php else : ?>
                            <li><a href="?url=pageUser"><i class="fas fa-chevron-right"></i>Mon profil</a></li>
                            <li><a href="?url=pageGroupe"><i class="fas fa-chevron-right"></i>Mes groupes</a></li>
                        <?php endif; ?>
                        <li class="last"><a href="?url=deconnexion"><i class="fas fa-chevron-right"></i>Deconnexion</a>
                        </li>
                    </ul>
                </li>
            <?php else : ?>
                <li class="last-li">
                    <a href="?url=connexion">
                        <?php echo 'Connexion'; ?>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</header>

<?= $content ?>

<script>
    let actu = 0;

    function derouler() {
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

<footer>
    <p>&copy Développé par William Fontaine, Léopold Lapendéry, Florent Buhot, Loris Regnier et Maël Goareguer.</p>
</footer>

</html>