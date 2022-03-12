<?php

//gen
$rep = __DIR__ . '/../';

//BD
$base = 'sqlite:' . $rep . '/base/base.sqlite';

//vues
$vues['accueil'] = 'views/viewAccueil.php';
$vues['connexion'] = 'views/viewConnexion.php';
$vues['erreur'] = 'views/viewErreur.php';
$vues['inscription'] = 'views/viewInscription.php';
$vues['leaderboard'] = 'views/viewLeaderboard.php';
$vues['leaderboardEnigme'] = 'views/viewLeaderboardEnigme.php';
$vues['utilisateur'] = 'views/viewUtilisateur.php';

//style
$style['accueil'] = 'public/css/accueil.css';
$style['adaptation'] = 'public/css/adaptation.css';
$style['classement'] = 'public/css/classement.css';
$style['enigme'] = 'public/css/enigme.css';
$style['footer'] = 'public/css/footer.css';
$style['index'] = 'public/css/index.css';
$style['leaderBoard'] = 'public/css/leaderBoard.css';
$style['listeEnigme'] = 'public/css/listeEnigme.css';
$style['menu'] = 'public/css/menu.css';
$style['compte'] = 'public/css/compte.css';
$style['admin'] = 'public/css/admin.css';
$style['adaptation'] = 'public/css/adaptation.css';

//images
$image['bg'] = 'public/image/bg.jpg';
$image['image'] = 'public/image/image.jpeg';
$image['onglet'] = 'public/image/key-solid.png';
$image['ASCII'] = 'public/image/tableauASCII.png';
$image['star-3'] = 'public/image/3star_diff.png';
$image['etoile1tier'] = 'public/image/etoiles/etoile1tier.png';
$image['etoile2tier'] = 'public/image/etoiles/etoile2tier.png';
$image['etoileFull'] = 'public/image/etoiles/etoileAll.png';
$image['etoileBlanche'] = 'public/image/etoiles/etoileBlanche.png';
$image['etoileMoitie'] = 'public/image/etoiles/etoileMoitie.png';

// js classique
$js['contenu'] = 'public/js/contenu.js';
$js['indice'] = 'public/js/indice.js';
$js['niveau'] = 'public/js/niveau.js';
$js['sendForm'] = 'public/js/sendForm.js';
$js['timer'] = 'public/js/timer.js';

// js des énigmes
$enigme['ADFGVX'] = 'public/js/enigme/ADFGVX.js';
$enigme['bitcoin'] = 'public/js/enigme/bitcoin.js';
$enigme['cesar'] = 'public/js/enigme/cesar.js';
$enigme['malleable'] = 'public/js/enigme/malleable.js';
$enigme['OTP'] = 'public/js/enigme/OTP.js';
$enigme['permutation'] = 'public/js/enigme/permutation.js';
$enigme['shamir'] = 'public/js/enigme/shamir.js';
$enigme['solidite'] = 'public/js/enigme/solidite.js';


//liste des énigmes
$enigmes = [["melimelo", "Un Méli-mélo de caractères"],
    ["jules", "Les énigmes de Jules"],
    ["malleable", "Chiffrement malléable"],
    ["sursur", "Vous avez dit sûr, ...sûr"],
    ["allemand", "Un chiffrement presque allemand"],
    ["solidite", "Solidité d'un mot de passe"],
    ["bitcoin", "Payer en Bitcoin"],
    ["shamir", "Le partage de Shamir"]];

$difficultes = ["melimelo" => 1,
    "jules" => 1,
    "malleable" => 2,
    "sursur" => 2,
    "allemand" => 2,
    "solidite" => 2,
    "bitcoin" => 3,
    "shamir" => 3];

