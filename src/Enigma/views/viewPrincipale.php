<head>
    <?php global $dir, $style, $image; ?>

    <!-- CSS de la page -->
    <link rel="stylesheet" href="<?= $dir . $style['listeEnigme'] ?>">
    <link rel="stylesheet" href="<?= $dir . $style['adaptation'] ?>">
    <!-- Titre de la page-->
    <title><?= $t ?></title>
</head>

<?php $this->_t = "Mission Crypto"; ?>

<main>

    <div class="container">
        <div class="card-container">
            <div class="enigme">
                <div class="card">
                    <div class="front">
                        <img src="<?= $dir . $image['image'] ?>" alt="livre de Pascal Lafourcade">
                        <h2 class="grand-h2">Un méli-mélo de caractères</h2>
                    </div>
                    <div class="back">
                        <h3>Un méli-mélo de caractères</h3>
                        <p>Chiffrer des messages textuels s'avère être plutôt simple, par exemple le chiffrement
                            ENIGMA, mais est-il plus simple de les déchiffrer?</p>
                        <a href="?url=permutation" class="try-it">
                            Jouer
                        </a>
                    </div>
                </div>
                <div class="star-container1">
                    <?php if (isset($dico['melimelo'])): ?>
                        <?php switch ($dico['melimelo']):
                            case 1: ?>
                                <img src="<?= $dir . $image['etoile1tier'] ?>" class="etoile1"
                                     alt="etoile de difficulté">
                                <?php break;
                            case 2: ?>
                                <img src="<?= $dir . $image['etoile2tier'] ?>" alt="etoile de difficulté">
                                <?php break;
                            case 3: ?>
                                <img src="<?= $dir . $image['etoileFull'] ?>" alt="etoile de difficulté">
                                <?php break;
                            default: ?>
                                <img src="<?= $dir . $image['etoileBlanche'] ?>" alt="etoile de difficulté">
                            <?php endswitch; ?>
                    <?php else: ?>
                        <img src="<?= $dir . $image['etoileBlanche'] ?>" alt="etoile de difficulté">
                    <?php endif; ?>
                </div>
            </div>
            <div class="enigme">
                <div class="card">
                    <div class="front">
                        <img src="<?= $dir . $image['image'] ?>" alt="livre de Pascal Lafourcade">
                        <h2 class="grand-h2">Les énigmes de Jules</h2>
                    </div>
                    <div class="back">  
                        <h3>Les énigmes de Jules</h3>
                        <p>Le chiffrement par décalage de César compte parmi les plus élémentaires des chiffrements par
                            substitution. Saurez-vous craquer ce chiffrement ?</p>
                        <a href="?url=substitution" class="try-it">
                            Jouer
                        </a>
                    </div>
                </div>
                <div class="star-container1">
                    <?php if (isset($dico['jules'])): ?>
                        <?php switch ($dico['jules']):
                            case 1: ?>
                                <img src="<?= $dir . $image['etoile1tier'] ?>" alt="etoile de difficulté">
                                <?php break;
                            case 2: ?>
                                <img src="<?= $dir . $image['etoile2tier'] ?>" alt="etoile de difficulté">
                                <?php break;
                            case 3: ?>
                                <img src="<?= $dir . $image['etoileFull'] ?>" alt="etoile de difficulté">
                                <?php break;
                            default: ?>
                                <img src="<?= $dir . $image['etoileBlanche'] ?>" alt="etoile de difficulté">
                            <?php endswitch; ?>
                    <?php else: ?>
                        <img src="<?= $dir . $image['etoileBlanche'] ?>" alt="etoile de difficulté">
                    <?php endif; ?>
                </div>
            </div>

            <div class="enigme">
                <div class="card">
                    <div class="front">
                        <img src="<?= $dir . $image['image'] ?>" alt="livre de Pascal Lafourcade">
                        <h2 class="grand-h2">Chiffrement malléable</h2>
                    </div>
                    <div class="back">
                        <h3>Chiffrement malléable</h3>
                        <p>Les chiffrements partiellement homomorphes peuvent paraître laborieux, mais leur utilisation
                            est plus simple qu'on le croit, saurez-vous le déchiffrer?</p>
                        <a href="?url=malleable" class="try-it">
                            Jouer
                        </a>
                    </div>
                </div>
                <div class="star-container2">
                    <?php if (isset($dico['malleable'])): ?>
                        <?php switch ($dico['malleable']):
                            case 1: ?>
                                <img src="<?= $dir . $image['etoile2tier'] ?>" alt="etoile de difficulté">
                                <img src="<?= $dir . $image['etoileBlanche'] ?>" alt="etoile de difficulté">
                                <?php break;
                            case 2: ?>
                                <img src="<?= $dir . $image['etoileFull'] ?>" alt="etoile de difficulté">
                                <img src="<?= $dir . $image['etoile1tier'] ?>" alt="etoile de difficulté">

                                <?php break;
                            case 3: ?>
                                <img src="<?= $dir . $image['etoileFull'] ?>" alt="etoile de difficulté">
                                <img src="<?= $dir . $image['etoileFull'] ?>" alt="etoile de difficulté">
                                <?php break;
                            default: ?>
                                <img src="<?= $dir . $image['etoileBlanche'] ?>" alt="etoile de difficulté">
                                <img src="<?= $dir . $image['etoileBlanche'] ?>" alt="etoile de difficulté">
                            <?php endswitch; ?>
                    <?php else: ?>
                        <img src="<?= $dir . $image['etoileBlanche'] ?>" alt="etoile de difficulté">
                        <img src="<?= $dir . $image['etoileBlanche'] ?>" alt="etoile de difficulté">
                    <?php endif; ?>
                </div>
            </div>

            <div class="enigme">
                <div class="card">
                    <div class="front">
                        <img src="<?= $dir . $image['image'] ?>" alt="livre de Pascal Lafourcade">
                        <h2 class="grand-h2">Vous avez dit sûr, ...sûr</h2>
                    </div>
                    <div class="back">
                        <h3>Vous avez dit sûr, ...sûr</h3>
                        <p>Le protocole à trois passes de Shamir est facile d'utilisation et sur le papier, plutôt
                            sécurisé. Mais au fond, l'est-il vraiment ?</p>
                        <a href="?url=OTP" class="try-it">
                            Jouer
                        </a>
                    </div>
                </div>
                <div class="star-container2">
                    <?php if (isset($dico['sursur'])): ?>
                        <?php switch ($dico['sursur']):
                            case 1: ?>
                                <img src="<?= $dir . $image['etoile2tier'] ?>" alt="etoile de difficulté">
                                <img src="<?= $dir . $image['etoileBlanche'] ?>" alt="etoile de difficulté">
                                <?php break;
                            case 2: ?>
                                <img src="<?= $dir . $image['etoileFull'] ?>" alt="etoile de difficulté">
                                <img src="<?= $dir . $image['etoile1tier'] ?>" alt="etoile de difficulté">
                                <?php break;
                            case 3: ?>
                                <img src="<?= $dir . $image['etoileFull'] ?>" alt="etoile de difficulté">
                                <img src="<?= $dir . $image['etoileFull'] ?>" alt="etoile de difficulté">
                                <?php break;
                            default: ?>
                                <img src="<?= $dir . $image['etoileBlanche'] ?>" alt="etoile de difficulté">
                                <img src="<?= $dir . $image['etoileBlanche'] ?>" alt="etoile de difficulté">
                            <?php endswitch; ?>
                    <?php else: ?>
                        <img src="<?= $dir . $image['etoileBlanche'] ?>" alt="etoile de difficulté">
                        <img src="<?= $dir . $image['etoileBlanche'] ?>" alt="etoile de difficulté">
                    <?php endif; ?>
                </div>
            </div>

            <div class="enigme">
                <div class="card">
                    <div class="front">
                        <img src="<?= $dir . $image['image'] ?>" alt="livre de Pascal Lafourcade">
                        <h2 class="grand-h2">Un chiffrement presque allemand</h2>
                    </div>
                    <div class="back">
                        <h3>Un chiffrement presque allemand</h3>
                        <p>Le chiffrement ADFGVX a été inventé par les Allemands pendant la 1ère guerre mondiale, mais
                            fut rapidement cassé par un lieutenant français. Saurez-vous faire de même ?</p>
                        <a href="?url=ADFGVX" class="try-it">
                            Jouer
                        </a>
                    </div>
                </div>
                <div class="star-container2">
                    <?php if (isset($dico['allemand'])): ?>
                        <?php switch ($dico['allemand']):
                            case 1: ?>
                                <img src="<?= $dir . $image['etoileMoitie'] ?>" alt="etoile de difficulté">
                                <img src="<?= $dir . $image['etoileBlanche'] ?>" alt="etoile de difficulté">
                                <?php break;
                            case 2: ?>
                                <img src="<?= $dir . $image['etoileFull'] ?>" alt="etoile de difficulté">
                                <img src="<?= $dir . $image['etoileMoitie'] ?>" alt="etoile de difficulté">
                                <?php break;
                            case 3: ?>
                                <img src="<?= $dir . $image['etoileFull'] ?>" alt="etoile de difficulté">
                                <img src="<?= $dir . $image['etoileFull'] ?>" alt="etoile de difficulté">
                                <?php break;
                            default: ?>
                                <img src="<?= $dir . $image['etoileBlanche'] ?>" alt="etoile de difficulté">
                                <img src="<?= $dir . $image['etoileBlanche'] ?>" alt="etoile de difficulté">
                            <?php endswitch; ?>
                    <?php else: ?>
                        <img src="<?= $dir . $image['etoileBlanche'] ?>" alt="etoile de difficulté">
                        <img src="<?= $dir . $image['etoileBlanche'] ?>" alt="etoile de difficulté">
                    <?php endif; ?>
                </div>
            </div>

            <div class="enigme">
                <div class="card">
                    <div class="front">
                        <img src="<?= $dir . $image['image'] ?>" alt="livre de Pascal Lafourcade">
                        <h2 class="grand-h2">Solidité d'un mot de passe</h2>
                    </div>
                    <div class="back">
                        <h3>Solidité d'un mot de passe</h3>
                        <p>De nos jours, nos mots de passe doivent être de plus en plus sécurisés et de nombreux
                            critères entrent en compte dans leurs sécurités. Saurez-vous trouver leurs solidités et
                            leurs problèmes ?</p>
                        <a href="?url=solidite" class="try-it">
                            Jouer
                        </a>
                    </div>
                </div>
                <div class="star-container2">
                    <?php if (isset($dico['solidite'])): ?>
                        <?php switch ($dico['solidite']):
                            case 1: ?>
                                <img src="<?= $dir . $image['etoileMoitie'] ?>" alt="etoile de difficulté">
                                <img src="<?= $dir . $image['etoileBlanche'] ?>" alt="etoile de difficulté">
                                <?php break;
                            case 2: ?>
                                <img src="<?= $dir . $image['etoileFull'] ?>" alt="etoile de difficulté">
                                <img src="<?= $dir . $image['etoileMoitie'] ?>" alt="etoile de difficulté">
                                <?php break;
                            case 3: ?>
                                <img src="<?= $dir . $image['etoileFull'] ?>" alt="etoile de difficulté">
                                <img src="<?= $dir . $image['etoileFull'] ?>" alt="etoile de difficulté">
                                <?php break;
                            default: ?>
                                <img src="<?= $dir . $image['etoileBlanche'] ?>" alt="etoile de difficulté">
                                <img src="<?= $dir . $image['etoileBlanche'] ?>" alt="etoile de difficulté">
                            <?php endswitch; ?>
                    <?php else: ?>
                        <img src="<?= $dir . $image['etoileBlanche'] ?>" alt="etoile de difficulté">
                        <img src="<?= $dir . $image['etoileBlanche'] ?>" alt="etoile de difficulté">
                    <?php endif; ?>
                </div>
            </div>

            <div class="enigme">
                <div class="card">
                    <div class="front">
                        <img src="<?= $dir . $image['image'] ?>" alt="livre de Pascal Lafourcade">
                        <h2 class="grand-h2">Payer en Bitcoin</h2>
                    </div>
                    <div class="back">
                        <h3>Payer en Bitcoin</h3>
                        <p>Les transactions Bitcoins sont les plus nombreuses dans le domaine des crypto-monnaies, elles
                            sont très compliquées, mais saurez-vous déchiffrement ce chiffrement simplifié ?</p>
                        <a href="?url=bitcoin" class="try-it">
                            Jouer
                        </a>
                    </div>
                </div>
                <div class="star-container3">
                    <?php if (isset($dico['bitcoin'])): ?>
                        <?php switch ($dico['bitcoin']):
                            case 1: ?>
                                <img src="<?= $dir . $image['etoileFull'] ?>" alt="etoile de difficulté">
                                <img src="<?= $dir . $image['etoileBlanche'] ?>" alt="etoile de difficulté">
                                <img src="<?= $dir . $image['etoileBlanche'] ?>" alt="etoile de difficulté">
                                <?php break;
                            case 2: ?>
                                <img src="<?= $dir . $image['etoileFull'] ?>" alt="etoile de difficulté">
                                <img src="<?= $dir . $image['etoileFull'] ?>" alt="etoile de difficulté">
                                <img src="<?= $dir . $image['etoileMoitie'] ?>" alt="etoile de difficulté">
                                <?php break;
                            case 3: ?>
                                <img src="<?= $dir . $image['etoileFull'] ?>" alt="etoile de difficulté">
                                <img src="<?= $dir . $image['etoileFull'] ?>" alt="etoile de difficulté">
                                <img src="<?= $dir . $image['etoileFull'] ?>" alt="etoile de difficulté">
                                <?php break;
                            default: ?>
                                <img src="<?= $dir . $image['etoileBlanche'] ?>" alt="etoile de difficulté">
                                <img src="<?= $dir . $image['etoileBlanche'] ?>" alt="etoile de difficulté">
                                <img src="<?= $dir . $image['etoileBlanche'] ?>" alt="etoile de difficulté">
                            <?php endswitch; ?>
                    <?php else: ?>
                        <img src="<?= $dir . $image['etoileBlanche'] ?>" alt="etoile de difficulté">
                        <img src="<?= $dir . $image['etoileBlanche'] ?>" alt="etoile de difficulté">
                        <img src="<?= $dir . $image['etoileBlanche'] ?>" alt="etoile de difficulté">
                    <?php endif; ?>
                </div>
            </div>

            <div class="enigme">
                <div class="card">
                    <div class="front">
                        <img src="<?= $dir . $image['image'] ?>" alt="livre de Pascal Lafourcade">
                        <h2 class="grand-h2">Le partage de Shamir</h2>
                    </div>
                    <div class="back">
                        <h3>Le partage de Shamir</h3>
                        <p>Les mathématiques sont le nerf de la cryptographie et permettent le chiffrement sécurisé à
                            l'aide de fonction polynomiale. Saurez-vous utiliser ces polynômes de différents degrés
                            pour résoudre cette énigme ?</p>
                        <div class="bouton">
                            <a href="?url=shamir" class="try-it">
                                Jouer
                            </a>
                        </div>
                    </div>
                </div>
                <div class="star-container3">
                    <?php if (isset($dico['shamir'])): ?>
                        <?php switch ($dico['shamir']):
                            case 1: ?>
                                <img src="<?= $dir . $image['etoileFull'] ?>" alt="etoile de difficulté">
                                <img src="<?= $dir . $image['etoileBlanche'] ?>" alt="etoile de difficulté">
                                <img src="<?= $dir . $image['etoileBlanche'] ?>" alt="etoile de difficulté">
                                <?php break;
                            case 2: ?>
                                <img src="<?= $dir . $image['etoileFull'] ?>" alt="etoile de difficulté">
                                <img src="<?= $dir . $image['etoileFull'] ?>" alt="etoile de difficulté">
                                <img src="<?= $dir . $image['etoileMoitie'] ?>" alt="etoile de difficulté">
                                <?php break;
                            case 3: ?>
                                <img src="<?= $dir . $image['etoileFull'] ?>" alt="etoile de difficulté">
                                <img src="<?= $dir . $image['etoileFull'] ?>" alt="etoile de difficulté">
                                <img src="<?= $dir . $image['etoileFull'] ?>" alt="etoile de difficulté">
                                <?php break;
                            default: ?>
                                <img src="<?= $dir . $image['etoileBlanche'] ?>" alt="etoile de difficulté">
                                <img src="<?= $dir . $image['etoileBlanche'] ?>" alt="etoile de difficulté">
                                <img src="<?= $dir . $image['etoileBlanche'] ?>" alt="etoile de difficulté">
                            <?php endswitch; ?>
                    <?php else: ?>
                        <img src="<?= $dir . $image['etoileBlanche'] ?>" alt="etoile de difficulté">
                        <img src="<?= $dir . $image['etoileBlanche'] ?>" alt="etoile de difficulté">
                        <img src="<?= $dir . $image['etoileBlanche'] ?>" alt="etoile de difficulté">
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>
</main>