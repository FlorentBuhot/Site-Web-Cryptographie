<?php

class ControllerUser
{
    private $_view;
    private $_manager;

    /**
     * @throws Exception
     */
    public function __construct($url)
    {
        if (isset($url) && count(array($url)) > 1) {
            throw new Exception('Page introuvable');
        }
        $action = Nettoyage::clearString((array_key_exists('action', $_REQUEST) ? $_REQUEST['action'] : ""));
        if ($action != "") {
            switch ($action) {
                case "formulaireChangeMdp":
                    $this->changerMdp();
                    return;
                case "formulaireSuppCompte":
                    $this->suppCompte();
                    return;
                case "formulaireImageProfil":
                    $this->changerImageProfil();
                    return;
                case "formulaireSuppImageProfil":
                    $this->suppImageProfil();
                    return;
                case "formulaireQuitterGrp":
                    $this->quitterGroupe();
                    return;
                case "formulaireRejoindreGroupe":
                    $this->joinGroupe();
                    return;
            }
        }

        switch ($url) {
            case "deconnexion":
                $this->deconnexion();
                return;
            case "pageGroupe":
                $this->pageDesGroupe();
                return;
            case "pageUser":
                $this->pageUtilisateur();
                return;
            case "groupe":
                $this->pageGroupe();
                return;
        }
        throw new Exception("La page que vous recherchez n'existe plus où est introuvable, veuillez retourner à l'accueil du site !");
    }

    /**
     * @throws Exception
     */
    private function changerMdp()
    {
        $destinataire = Nettoyage::ClearString($_SESSION['email']);
        $this->_manager = new UserManager();
        $pseudo = Nettoyage::clearString($_SESSION['username']);
        $token = uniqid();
        $this->_manager->insererUrl($token, $pseudo, "reinitMdp");
        Envoyeur::sendEmail($pseudo, $destinataire, $token, "reinitMdp");
        $this->pageUtilisateurSuccess("Un mail de réinitialisation a bien été envoyé !");
    }

    /**
     * @throws Exception
     */
    private function pageUtilisateurSuccess($dVueSuccess = NULL)
    {
        $this->_manager = new UserManager();
        $user = $this->_manager->getOneUser("pseudo", Nettoyage::clearString($_SESSION['username']));
        $this->_manager = new GroupeManager();
        $nbGrp = $this->_manager->getNombreGroupe(Nettoyage::clearString($_SESSION['username']));
        $groupes = $this->_manager->getGroupByPseudo(Nettoyage::clearString($_SESSION['username']));
        $myGroups = $this->_manager->getMyGroups(Nettoyage::clearString($_SESSION['username']));
        $this->_view = new View("Utilisateur");
        $this->_view->generate(['dVueSuccess' => $dVueSuccess, 'user' => $user, 'nbGrp' => $nbGrp, 'groupes' => $groupes, 'myGroups' => $myGroups]);
    }

    /**
     * @throws Exception
     */
    private function suppCompte()
    {
        $mdp = Nettoyage::clearString($_POST['txtMdp']);
        $mdpConfirm = Nettoyage::clearString($_POST['txtMdpConfirm']);
        $pseudo = Nettoyage::clearString($_SESSION['username']);
        $this->_manager = new UserManager();
        if ($this->_manager->trouverUserParPseudo($pseudo, $mdp)) {
            if ($mdp == $mdpConfirm) {
                $this->_manager->mailSuppr($pseudo, Nettoyage::clearString($_SESSION['email']));
                $this->pageUtilisateurSuccess(["Un mail vous a été envoyé pour confirmer la suppression de votre compte !"]);
            } else
                $this->pageUtilisateur("Les deux mots de passe ne correspondent pas.");
        } else
            $this->pageUtilisateur('Le mot de passe renseigné n\'est pas correct.');
    }

    /**
     * @throws Exception
     */
    private function pageUtilisateur($dVueErreur = NULL)
    {
        $this->_manager = new UserManager();
        $user = $this->_manager->getOneUser("pseudo", Nettoyage::clearString($_SESSION['username']));

        $this->_view = new View("Utilisateur");
        $this->_view->generate(['dVueErreur' => $dVueErreur, 'user' => $user]);
    }

    /**
     * @throws Exception
     */
    function changerImageProfil()
    {
        $tmp = $_FILES['avatar']['name'];
        if ($_SESSION['username']) {
            if (isset($_FILES['avatar']) and $_FILES['avatar']['error'] == 0) {
                $infosfichier = pathinfo($_FILES['avatar']['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('jpg', 'jpeg', 'png', 'jfif');
                if (in_array($extension_upload, $extensions_autorisees)) {
                    $dirpath = realpath(dirname(getcwd())) . '/Enigma/dist/image/';
                    $i = 0;
                    if (file_exists($dirpath . $tmp)) {
                        $i++;
                        $tmp = Nettoyage::SupExt($_FILES['avatar']['name']) . $i . '.' . (new SplFileInfo($_FILES['avatar']['name']))->getExtension();
                    }
                    move_uploaded_file($_FILES['avatar']['tmp_name'], $dirpath . $tmp);
                    if($_SESSION['imgProfil'] != null)
                        unlink($dirpath . $_SESSION['imgProfil']);
                    $this->_manager = new UserManager();
                    $this->_manager->addImageProfil($tmp, Nettoyage::clearString($_SESSION['username']));
                    $_SESSION['imgProfil'] = $tmp;
                    $this->pageUtilisateurSuccess('Votre image de profil a été changée avec succès.');
                    return;
                }
            } else {
                $this->pageUtilisateur('Erreur de téléchargement !');
                return;
            }
        } else {
            $this->pageUtilisateur('Erreur, vous n\'êtes pas connecté !');
            return;
        }
        $this->pageUtilisateur('Le type d\'image sélectionnée n\'est pas pris en compte.');
    }

    /**
     * @throws Exception
     */
    private
    function suppImageProfil()
    {
        $this->_manager = new UserManager();
        $this->_manager->suppImgProfil(Nettoyage::clearString($_SESSION['username']));
        unlink(Nettoyage::clearString(realpath(dirname(getcwd())) . '/Enigma/dist/image/' . $_SESSION['imgProfil']));
        $_SESSION['imgProfil'] = null;
        $this->pageUtilisateurSuccess('Votre image de profil a bien été supprimée.');
    }

    private function quitterGroupe()
    {
        $username = Nettoyage::clearString($_SESSION['username']);
        $id = Nettoyage::clearString($_GET['id']);
        $chef = Nettoyage::clearString($_GET['chef']);
        $this->_manager = new GroupeManager();
        $this->_manager->exclureUser($id, $username, $chef);
        header("Location: index.php?url=pagePrincipale");
    }

    /**
     * @throws Exception
     */
    private
    function joinGroupe()
    {
        $this->_manager = new GroupeManager();
        $id = Nettoyage::clearString($_POST['nameGrp']);
        $chef = Nettoyage::clearString($_POST['chefGrp']);
        if (isset($_SESSION['username'])) {
            if ($this->_manager->getOneMember(Nettoyage::clearString($_SESSION['username']), $id, $chef) == null) {
                $groupe = $this->_manager->getOneByName($id, $chef);
                if ($groupe != null) {
                    $pseudoChef = Nettoyage::clearString($_POST['chefGrp']);
                    if ($groupe[0]->getPseudoChef() == $pseudoChef) {
                        if (password_verify(Nettoyage::clearString($_POST['mdpGrp']), $groupe[0]->getMdp())) {
                            $this->_manager->joinTheGroupe(Nettoyage::clearString($_SESSION['username']), $id, $chef);
                            $this->pageDesGroupeSuccess('Vous avez bien rejoint le groupe.');
                            return;
                        }
                    }
                    $this->pageDesGroupe('Cet utilisateur ne possède aucun groupe de ce nom.');
                } else
                    $this->pageDesGroupe('Aucun groupe ne correspond à votre demande.');
            } else {
                $this->pageDesGroupe('Vous faites déjà parti de ce groupe.');
            }
        } else {
            throw new Exception('Vous devez vous connecter pour rejoindre un groupe.');
        }
    }

    /**
     * @throws Exception
     */
    private function pageDesGroupeSuccess($dVueSuccess)
    {
        $this->_manager = new GroupeManager();
        $nbGrp = $this->_manager->getNombreGroupe(Nettoyage::clearString($_SESSION['username']));
        $groupes = $this->_manager->getGroupByPseudo(Nettoyage::clearString($_SESSION['username']));
        $myGroups = $this->_manager->getMyGroups(Nettoyage::clearString($_SESSION['username']));
        $this->_view = new View('PageGroupe');
        $this->_view->generate(['dVueSuccess' => $dVueSuccess, 'nbGrp' => $nbGrp, 'groupes' => $groupes, 'myGroups' => $myGroups]);
    }

    /**
     * @throws Exception
     */
    private function pageDesGroupe($dVueErreur = null)
    {
        $this->_manager = new GroupeManager();
        $nbGrp = $this->_manager->getNombreGroupe(Nettoyage::clearString($_SESSION['username']));
        $groupes = $this->_manager->getGroupByPseudo(Nettoyage::clearString($_SESSION['username']));
        $myGroups = $this->_manager->getMyGroups(Nettoyage::clearString($_SESSION['username']));
        $this->_view = new View('PageGroupe');
        $this->_view->generate(['dVueErreur' => $dVueErreur, 'nbGrp' => $nbGrp, 'groupes' => $groupes, 'myGroups' => $myGroups]);
    }

    private
    function deconnexion()
    {
        session_unset();
        session_destroy();
        $_SESSION = array();
        header("Location: index.php?url=pagePrincipale");
    }

    /**
     * @throws Exception
     */
    private function pageGroupe()
    {
        $id = Nettoyage::clearString($_GET['id']);
        $chef = Nettoyage::clearString($_GET['chef']);
        $this->_manager = new GroupeManager();
        $members = $this->_manager->getMembers($id, $chef);
        $groupe = $this->_manager->getOneByName($id, $chef);
        $this->_view = new View('Groupe');
        $this->_view->generate(['members' => $members, 'groupe' => $groupe]);
    }
}