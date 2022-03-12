<?php

class ControllerVisiteur
{
    private $_manager;
    private $_view;

    /**
     * @throws Exception
     */
    public function __construct($url)
    {
        if (isset($url) && count([$url]) > 1) {
            throw new Exception('Page introuvable');
        } elseif (isset($url)) {
            if (!$this->verifUrl($url)) {
                $action = Nettoyage::clearString((array_key_exists('action', $_REQUEST) ? $_REQUEST['action'] : ""));
                if ($action != "") {
                    switch ($action) {
                        case "formConnexionPseudo":
                            $this->connexionParPseudo();
                            return;
                        case "formInscription":
                            $this->inscription();
                            return;
                        case "choixClassement":
                            $this->pageLeaderboardEnigme();
                            return;
                        case "formReinitMdp":
                            $this->reinitMdp();
                            return;
                        case "formReussirEnigme":
                            $this->ajouterTemps();
                            return;
                        case "formReussirEnigmeMenu":
                            $this->ajouterTempsMenu();
                            return;
                        case "formMdp":
                            $this->mdp();
                            return;
                        case "formMdpGrp":
                            $this->mdpGrp();
                            return;
                        case "formSupprPoints":
                            $this->retirerPoints();
                            return;
                    }
                } else {
                    switch ($url) {
                        case "accueil":
                            $this->pageAccueil();
                            return;
                        case "connexion":
                            $this->pageConnexion();
                            return;
                        case "inscription":
                            $this->pageInscription();
                            return;
                        case "reinitMdp":
                            $this->pageReinitMdp();
                            return;
                        case "leaderboardEnigme":
                            $this->pageLeaderboardEnigme();
                            return;
                        case "pagePrincipale":
                            $this->pagePrincipale();
                            return;
                        case "malleable":
                            $this->enigmeMalleable();
                            return;
                        case "OTP":
                            $this->enigmeOTP();
                            return;
                        case "permutation":
                            $this->enigmePermutation();
                            return;
                        case "bitcoin":
                            $this->enigmeBitcoin();
                            return;
                        case "ADFGVX":
                            $this->enigmeADFGVX();
                            return;
                        case "substitution":
                            $this->enigmeSubstitution();
                            return;
                        case "solidite":
                            $this->enigmeSolidite();
                            return;
                        case "shamir":
                            $this->enigmeShamir();
                            return;
                        default:
                            $this->pageAccueil();
                            break;
                    }
                }
            }
        }
    }

    /**
     * @throws Exception
     */
    public function verifUrl($url): bool
    {
        $this->_manager = new UserManager();
        $test = $this->_manager->verificationUrl($url);
        if (empty($test)) {
            return false;
        }
        if ($test != false) {
            $pseudo = $test[0]->getPseudo();
            switch ($test[0]->getFonction()) {
                case "inscription":
                    $this->_manager->validerUserMdl($pseudo);
                    $this->_manager->delAllUrlUser($pseudo);
                    $dVueErreur = "Votre mail a été vérifié, veuillez maintenant vous connecter.";
                    $this->pageConnexionSuccess($dVueErreur);
                    return true;
                case "suppression":
                    $user = $this->_manager->getOneUser('pseudo', $pseudo);
                    unlink(Nettoyage::clearString(realpath(dirname(getcwd())) . '/Enigma/dist/image/' . $user[0]->getImageProfil()));
                    $this->_manager->SupprimerCompte($pseudo);
                    $this->_manager->delAllUrlUser($pseudo);
                    session_destroy();
                    $dVueErreur = "Votre compte a bien été supprimé.";
                    $this->pageConnexionSuccess($dVueErreur);
                    return true;
                case "modifMdp":
                    $this->_manager->modifMdp($pseudo, $test[0]->getMdp());
                    $this->_manager->delAllUrlUser($pseudo);
                    $dVueErreur = "Votre mot de passe a bien été modifié.";
                    $this->pageConnexionSuccess($dVueErreur);
                    return true;
                case "reinitMdp":
                    $this->pageMdp($pseudo);
                    $this->_manager->delAllUrlUser($pseudo);
                    return true;
                case "reinitMdpGrp":
                    var_export($test);
                    $this->pageMdpGrp($test[0]->getGroupe(), $pseudo);
                    $this->_manager->delAllUrlUser($pseudo);
                    return true;
                default:
                    break;
            }
        }
        return false;
    }

    /**
     * @throws Exception
     */
    private function pageConnexionSuccess($dVueSuccess)
    {
        $this->_view = new View('Connexion');
        $this->_view->generateCompte(['dVueSuccess' => $dVueSuccess]);
    }

    /**
     * @throws Exception
     */
    private function pageMdp($pseudo)
    {
        $this->_view = new View('Mdp');
        $this->_view->generateCompte(['dVueErreur' => null, 'pseudo' => $pseudo]);
    }

    /**
     * @throws Exception
     */
    private function pageMdpGrp($groupe, $pseudo)
    {
        $this->_view = new View('MdpGrp');
        $this->_view->generateCompte(['dVueErreur' => null, 'groupe' => $groupe, 'pseudo' => $pseudo]);
    }

    /**
     * @throws Exception
     */
    private function connexionParPseudo()
    {
        $this->_manager = new UserManager();
        $nom = Nettoyage::clearString($_POST['txtNom']);
        $mdp = Nettoyage::clearString($_POST['txtMdp']);
        if ($this->_manager->trouverUserParPseudo($nom, $mdp)) {
            $user = $this->_manager->getOneUser("pseudo", $nom);
            if ($user[0]->getVerif() == 0) {
                $dVueErreur = "Vous n'avez pas encore validé votre compte !";
                $this->pageConnexion($dVueErreur);
            } else {
                $_SESSION['username'] = $user[0]->getPseudo();
                $_SESSION['type'] = $user[0]->getType();
                $_SESSION['imgProfil'] = $user[0]->getImageProfil();
                $_SESSION['email'] = $user[0]->getMail();
                $this->pagePrincipale();
            }
        } else {
            $dVueErreur = "Le mot de passe et le pseudo ne correspondent pas !";
            $this->pageConnexion($dVueErreur);
        }
    }

    /**
     * @throws Exception
     */
    private function pageConnexion($dVueErreur = NULL)
    {
        $this->_view = new View('Connexion');
        if ($dVueErreur == NULL) {
            $this->_view->generateCompte(['dVueErreur' => NULL]);
        } else {
            $this->_view->generateCompte(['dVueErreur' => $dVueErreur]);
        }
    }

    /**
     * @throws Exception
     */
    private function pagePrincipale()
    {
        $this->_view = new View('Principale');
        $dVueErreur = [];
        $this->_manager = new ClassementManager();
        if (isset($_SESSION['username'])) {
            $nomEnigme = $this->_manager->getAllByUser(Nettoyage::clearString($_SESSION['username']));
            $dico = ["melimelo" => 0,
                "jules" => 0,
                "malleable" => 0,
                "sursur" => 0,
                "allemand" => 0,
                "solidite" => 0,
                "bitcoin" => 0,
                "shamir" => 0];
            foreach ($nomEnigme as $e) {
                $dico[$e->getNomEnigme()]++;
            }
            $this->_view->generate(['dVueErreur' => $dVueErreur, 'dico' => $dico]);
            return;
        }
        $this->_view->generate(['dVueErreur' => $dVueErreur]);

    }

    /**
     * @throws Exception
     */
    private function inscription()
    {
        $dVueErreur = [];
        $pseudo = Nettoyage::clearString($_POST['txtNom']);
        $email = Nettoyage::ClearString($_POST['txtEmail']);
        $mdp = Nettoyage::clearString($_POST['txtMdp']);
        $mdpConfirm = Nettoyage::clearString($_POST['txtMdpConfirm']);
        $this->_manager = new UserManager();
        if ($mdp == $mdpConfirm) {
            if (!empty($dVueErreur)) {
                $this->pageInscription($dVueErreur);
            } elseif ($this->_manager->exist("mail", $email)) {
                $dVueErreur = "Un utilisateur possède déjà cet email.";
                $this->pageInscription($dVueErreur);
            } elseif ($this->_manager->exist("pseudo", $pseudo)) {
                $dVueErreur = "Un utilisateur possède déjà ce pseudo.";
                $this->pageInscription($dVueErreur);
            } else {
                $token = uniqid();
                $this->_manager->insererUrl($token, $pseudo, "inscription");
                $this->_manager->insertOneUser($pseudo, $mdp, $email, NULL);
                Envoyeur::sendEmail($pseudo, $email, $token, "inscription");
                $this->_view = new View('ConfirmationMail');
                $this->_view->generateCompte(['dVueErreur' => NULL]);
            }
        } else {
            $dVueErreur = "Les deux mots de passe ne correspondent pas !";
            $this->pageInscription($dVueErreur);
        }
    }

    /**
     * @throws Exception
     */
    private function pageInscription($dVueErreur = NULL)
    {
        $this->_view = new View('Inscription');
        if ($dVueErreur == NULL)
            $this->_view->generateCompte(['dVueErreur' => NULL]);
        else
            $this->_view->generateCompte(['dVueErreur' => $dVueErreur]);
    }

    /**
     * @throws Exception
     */
    private function pageLeaderboardEnigme()
    {
        $dVueErreur = [];
        $this->_manager = new ClassementManager();
        $selectedGroup = isset($_POST['groupe']) ? Nettoyage::clearString($_POST['groupe']) : "none";
        $selected = isset($_POST['choix']) ? Nettoyage::clearString($_POST['choix']) : "melimelo";
        $selectedNiveau = isset($_POST['niveau']) ? Nettoyage::clearInt($_POST['niveau']) : "1";
        $classement = $this->_manager->getAllTimeByNiveauEnigme($selected, $selectedNiveau, 1, 25);
        if (isset($_SESSION['username'])) {
            $this->_manager = new GroupeManager();
            $groups = $this->_manager->getMyGroups(Nettoyage::clearString($_SESSION['username']));
            $this->_view = new View('LeaderboardEnigme');
            $this->_manager = new ClassementManager();
            if ($selectedGroup == null or $selectedGroup == 'none')
                $classement = $this->_manager->getAllTimeByNiveauEnigme($selected, $selectedNiveau, 1, 25);
            else
                $classement = $this->_manager->getAllTimeByNiveauEnigmeAndGroup($selected, $selectedNiveau, $selectedGroup, 1, 25);
            $this->_view->generate(['dVueErreur' => $dVueErreur, 'classement' => $classement, 'selected' => $selected, 'selectedNiveau' => $selectedNiveau, 'groups' => $groups, 'selectedGroup' => $selectedGroup]);
            return;
        }
        $this->_view = new View('LeaderboardEnigme');
        $this->_view->generate(['dVueErreur' => $dVueErreur, 'classement' => $classement, 'selected' => $selected, 'selectedNiveau' => $selectedNiveau]);
    }

    /**
     * @throws Exception
     */
    private function reinitMdp()
    {
        $destinataire = Nettoyage::ClearString($_POST['txtEmail']);
        $this->_manager = new UserManager();
        if ($this->_manager->exist("mail", $destinataire)) {
            $user = $this->_manager->userParMail($destinataire);
            $pseudo = $user[0]->getPseudo();
            $token = uniqid();
            $this->_manager->insererUrl($token, $pseudo, "reinitMdp");
            Envoyeur::sendEmail($pseudo, $destinataire, $token, "reinitMdp");
            $this->pageConnexionSuccess("Le mail de réinitialisation du mot de passe a bien été envoyé !");
        } else {
            $this->pageReinitMdp("Aucun utilisateur n'est enregistré avec cet email !");
        }
    }

    /**
     * @throws Exception
     */
    private function pageReinitMdp($dVueErreur = NULL)
    {
        $this->_view = new View('ReinitialiserMdp');
        if ($dVueErreur == NULL)
            $this->_view->generateCompte(['dVueErreur' => NULL]);
        else
            $this->_view->generateCompte(['dVueErreur' => $dVueErreur]);
    }

    /**
     * @throws Exception
     */
    private function ajouterTemps()
    {
        if (isset($_SESSION['username'])) {
            $temps = Nettoyage::clearInt($_POST['time']);
            $nomEnigme = Nettoyage::clearString($_POST['enigme']);
            $pseudo = Nettoyage::clearString($_SESSION['username']);
            $niveau = Nettoyage::clearInt($_POST['niveau']);
            $this->_manager = new ClassementManager();
            $this->_manager->ajoutTemps($temps, $nomEnigme, $pseudo, $niveau);
            $this->ajouterPoints($pseudo, $niveau, $nomEnigme);
            $this->retirerPoints();
            switch ($nomEnigme) {
                case "malleable":
                    $this->enigmeMalleable();
                    return;
                case "sursur":
                    $this->enigmeOTP();
                    return;
                case "melimelo":
                    $this->enigmePermutation();
                    return;
                case "bitcoin":
                    $this->enigmeBitcoin();
                    return;
                case "allemand":
                    $this->enigmeADFGVX();
                    return;
                case "jules":
                    $this->enigmeSubstitution();
                    return;
                case "solidite":
                    $this->enigmeSolidite();
                    return;
                case "shamir":
                    $this->enigmeShamir();
                    return;
                default:
                    $this->pageAccueil();
                    break;
            }
        }
    }

    /**
     * @throws Exception
     */
    private function ajouterPoints($pseudo, $niveau, $nomEnigme)
    {
        global $difficultes;
        $this->_manager = new UserManager();
        $points = $this->_manager->attributePoints($niveau, $difficultes[$nomEnigme]);
        $this->_manager->updatePoints("+", $pseudo, $points);
    }

    /**
     * @throws Exception
     */
    public function retirerPoints()
    {
        $points = Nettoyage::clearInt($_POST['points']);
        $pseudo = Nettoyage::clearString($_SESSION['username']);
        $this->_manager = new UserManager();
        $this->_manager->updatePoints("-", $pseudo, $points);
    }

    /**
     * @throws Exception
     */
    private function enigmeMalleable()
    {
        $dVueErreur = [];
        $this->_view = new View('EnigmeMalleable');
        if (isset($_SESSION['username'])) {
            $pseudo = Nettoyage::clearString($_SESSION['username']);
            $this->_manager = new ClassementManager();
            $temps = $this->_manager->getAllTimeByEnigmeAndPseudo("malleable", $pseudo);
            $this->_manager = new UserManager();
            $user = $this->_manager->getOneUser('pseudo', $pseudo)[0];
            $this->_manager = new IndiceManager();
            $indices = $this->_manager->getIndicesByEnigme("malleable");
            $this->_view->generate(['dVueErreur' => $dVueErreur, 'temps' => $temps, 'user' => $user, 'indices' => $indices]);
        } else
            $this->_view->generate(['dVueErreur' => $dVueErreur]);

    }

    /**
     * @throws Exception
     */
    private function enigmeOTP()
    {
        $dVueErreur = [];
        $this->_view = new View('EnigmeOTP');
        if (isset($_SESSION['username'])) {
            $pseudo = Nettoyage::clearString($_SESSION['username']);
            $this->_manager = new ClassementManager();
            $temps = $this->_manager->getAllTimeByEnigmeAndPseudo("sursur", $pseudo);
            $this->_manager = new UserManager();
            $user = $this->_manager->getOneUser('pseudo', $pseudo)[0];
            $this->_manager = new IndiceManager();
            $indices = $this->_manager->getIndicesByEnigme("sursur");
            $this->_view->generate(['dVueErreur' => $dVueErreur, 'temps' => $temps, 'user' => $user, 'indices' => $indices]);
        } else
            $this->_view->generate(['dVueErreur' => $dVueErreur]);
    }

    /**
     * @throws Exception
     */
    private function enigmePermutation()
    {
        $dVueErreur = [];
        $this->_view = new View('EnigmePermutation');
        if (isset($_SESSION['username'])) {
            $pseudo = Nettoyage::clearString($_SESSION['username']);
            $this->_manager = new ClassementManager();
            $temps = $this->_manager->getAllTimeByEnigmeAndPseudo("melimelo", $pseudo);
            $this->_manager = new UserManager();
            $user = $this->_manager->getOneUser('pseudo', $pseudo)[0];
            $this->_manager = new IndiceManager();
            $indices = $this->_manager->getIndicesByEnigme("melimelo");
            $this->_view->generate(['dVueErreur' => $dVueErreur, 'temps' => $temps, 'user' => $user, 'indices' => $indices]);
        } else
            $this->_view->generate(['dVueErreur' => $dVueErreur]);
    }

    /**
     * @throws Exception
     */
    private function enigmeBitcoin()
    {
        $dVueErreur = [];
        $this->_view = new View('EnigmeBitcoin');
        if (isset($_SESSION['username'])) {
            $pseudo = Nettoyage::clearString($_SESSION['username']);
            $this->_manager = new ClassementManager();
            $temps = $this->_manager->getAllTimeByEnigmeAndPseudo("bitcoin", $pseudo);
            $this->_manager = new UserManager();
            $user = $this->_manager->getOneUser('pseudo', $pseudo)[0];
            $this->_manager = new IndiceManager();
            $indices = $this->_manager->getIndicesByEnigme("bitcoin");
            $this->_view->generate(['dVueErreur' => $dVueErreur, 'temps' => $temps, 'user' => $user, 'indices' => $indices]);
        } else
            $this->_view->generate(['dVueErreur' => $dVueErreur]);
    }

    /**
     * @throws Exception
     */
    private
    function enigmeADFGVX()
    {
        $dVueErreur = [];
        $this->_view = new View('EnigmeADFGVX');
        if (isset($_SESSION['username'])) {
            $pseudo = Nettoyage::clearString($_SESSION['username']);
            $this->_manager = new ClassementManager();
            $temps = $this->_manager->getAllTimeByEnigmeAndPseudo("allemand", $pseudo);
            $this->_manager = new UserManager();
            $user = $this->_manager->getOneUser('pseudo', $pseudo)[0];
            $this->_manager = new IndiceManager();
            $indices = $this->_manager->getIndicesByEnigme("allemand");
            $this->_view->generate(['dVueErreur' => $dVueErreur, 'temps' => $temps, 'user' => $user, 'indices' => $indices]);
        } else
            $this->_view->generate(['dVueErreur' => $dVueErreur]);
    }

    /**
     * @throws Exception
     */
    private
    function enigmeSubstitution()
    {
        $dVueErreur = [];
        $this->_view = new View('EnigmeSubstitution');
        if (isset($_SESSION['username'])) {
            $pseudo = Nettoyage::clearString($_SESSION['username']);
            $this->_manager = new ClassementManager();
            $temps = $this->_manager->getAllTimeByEnigmeAndPseudo("jules", $pseudo);
            $this->_manager = new UserManager();
            $user = $this->_manager->getOneUser('pseudo', $pseudo)[0];
            $this->_manager = new IndiceManager();
            $indices = $this->_manager->getIndicesByEnigme("jules");
            $this->_view->generate(['dVueErreur' => $dVueErreur, 'temps' => $temps, 'user' => $user, 'indices' => $indices]);
        } else
            $this->_view->generate(['dVueErreur' => $dVueErreur]);

    }

    /**
     * @throws Exception
     */
    private
    function enigmeSolidite()
    {
        $dVueErreur = [];
        $this->_view = new View('EnigmeSolidite');
        if (isset($_SESSION['username'])) {
            $pseudo = Nettoyage::clearString($_SESSION['username']);
            $this->_manager = new ClassementManager();
            $temps = $this->_manager->getAllTimeByEnigmeAndPseudo("solidite", $pseudo);
            $this->_manager = new UserManager();
            $user = $this->_manager->getOneUser('pseudo', $pseudo)[0];
            $this->_manager = new IndiceManager();
            $indices = $this->_manager->getIndicesByEnigme("solidite");
            $this->_view->generate(['dVueErreur' => $dVueErreur, 'temps' => $temps, 'user' => $user, 'indices' => $indices]);
        } else
            $this->_view->generate(['dVueErreur' => $dVueErreur]);
    }

    /**
     * @throws Exception
     */
    private
    function enigmeShamir()
    {
        $dVueErreur = [];
        $this->_view = new View('EnigmeShamir');
        if (isset($_SESSION['username'])) {
            $pseudo = Nettoyage::clearString($_SESSION['username']);
            $this->_manager = new ClassementManager();
            $temps = $this->_manager->getAllTimeByEnigmeAndPseudo("shamir", $pseudo);
            $this->_manager = new UserManager();
            $user = $this->_manager->getOneUser('pseudo', $pseudo)[0];
            $this->_manager = new IndiceManager();
            $indices = $this->_manager->getIndicesByEnigme("shamir");
            $this->_view->generate(['dVueErreur' => $dVueErreur, 'temps' => $temps, 'user' => $user, 'indices' => $indices]);
        } else
            $this->_view->generate(['dVueErreur' => $dVueErreur]);
    }

    /**
     * @throws Exception
     */
    private function pageAccueil()
    {
        $this->_manager = new IndiceManager;
        $this->_view = new View('Accueil');
        $dVueErreur = [];
        $this->_view->generateEmpty(['dVueErreur' => $dVueErreur]);
    }

    /**
     * @throws Exception
     */
    private function ajouterTempsMenu()
    {
        if (isset($_SESSION['username'])) {
            $temps = Nettoyage::clearInt($_POST['time']);
            $nomEnigme = Nettoyage::clearString($_POST['enigme']);
            $pseudo = Nettoyage::clearString($_SESSION['username']);
            $niveau = Nettoyage::clearInt($_POST['niveau']);
            $this->_manager = new ClassementManager();
            $this->_manager->ajoutTemps($temps, $nomEnigme, $pseudo, $niveau);
            $this->ajouterPoints($pseudo, $niveau, $nomEnigme);
            $this->retirerPoints();
        }
        header("Location: index.php?url=pagePrincipale");
    }

    /**
     * @throws Exception
     */
    private function mdp()
    {
        $mdp = Nettoyage::clearString($_POST['txtMdp']);
        $mdpConfirm = Nettoyage::clearString($_POST['txtMdpConfirm']);
        $pseudo = Nettoyage::clearString($_POST['txtPseudo']);
        $this->_manager = new UserManager();
        if ($mdp == $mdpConfirm) {
            $this->_manager->modifMdp($pseudo, password_hash($mdp, PASSWORD_DEFAULT));
            $this->pageConnexionSuccess("Vous pouvez maintenant vous connecter avec votre nouveau mot de passe !");
        }
    }

    /**
     * @throws Exception
     */
    private function mdpGrp()
    {
        $mdp = Nettoyage::clearString($_POST['txtMdp']);
        $mdpConfirm = Nettoyage::clearString($_POST['txtMdpConfirm']);
        $groupe = Nettoyage::clearString($_POST['txtGroupe']);
        $pseudo = Nettoyage::clearString($_POST['txtPseudo']);
        $this->_manager = new GroupeManager();
        if ($mdp == $mdpConfirm) {
            $this->_manager->modifyPassword($groupe, password_hash($mdp, PASSWORD_DEFAULT), $pseudo);
            $this->pageConnexionSuccess("Vous pouvez vous connecter et accéder à votre groupe !");
        }
    }
}