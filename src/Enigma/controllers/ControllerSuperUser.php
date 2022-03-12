<?php

class ControllerSuperUser
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
                case "formulaireCreerGrp":
                    $this->creerGroupe();
                    return;
                case "formulaireSuppGrp":
                    $this->suppGrp();
                    return;
                case "formulaireExclureUserGrp":
                    $this->exclureMembreGrp();
                    return;
                case "formulaireRejoindreGroupe":
                    $this->joinGroupe();
                    return;
                case "formulaireReinitMdpGrp":
                    $this->reinitMdpGrp();
                default:
                    break;
            }
        }

        if (isset($_GET['id'])) {
            $this->pageGroupeAdmin(Nettoyage::clearString($_GET['id']));
            return;
        }

        switch ($url) {
            case "pageGroupeAdmin":
                $this->pageDesGroupe();
                return;
            case "pageSuperUser":
                $this->pageSuperUtilisateur();
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
        $this->pageGroupeAdminSuccess("Le mail de réinitialisation a bien été envoyé !");
    }

    /**
     * @throws Exception
     */
    private function pageGroupeAdminSuccess($id, $dVueSuccess = null)
    {
        if (isset($_SESSION['username'])) {
            if (isset($_GET['chef'])) {
                $this->_manager = new GroupeManager();
                $groupe = $this->_manager->getOneByName($id, Nettoyage::clearString($_GET['chef']));
                if (Nettoyage::clearString($_SESSION['username']) != $groupe[0]->getNomGroupe()) {
                    $members = $this->_manager->getMembers($id, Nettoyage::clearString($_GET['chef']));
                    $this->_view = new View("GroupeAdmin");
                    $this->_view->generate(['dVueSuccess' => $dVueSuccess, 'groupe' => $groupe, 'members' => $members]);
                    return;
                }
                throw new Exception('Vous ne pouvez pas accéder à cette page car vous n\'êtes pas le chef de ce groupe.');
            }
            throw new Exception('Erreur : vous ne pouvez pas accéder à cette page de cette manière.');
        }
        throw new Exception('Veuillez vous connecter pour accéder à cette page.');
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
                $this->pageSuperUtilisateurSuccess(["Un mail vous a été envoyé pour confirmer la suppression de votre compte !"]);
            } else
                $this->pageSuperUtilisateur("Les deux mots de passe ne correspondent pas.");
        } else
            $this->pageSuperUtilisateur('Le mot de passe renseigné n\'est pas correct.');
    }

    /**
     * @throws Exception
     */
    private function pageSuperUtilisateurSuccess($dVueSuccess = NULL)
    {
        $this->_manager = new UserManager();
        $user = $this->_manager->getOneUser("pseudo", Nettoyage::clearString($_SESSION['username']));
        $this->_view = new View("SuperUtilisateur");
        $this->_view->generate(['dVueSuccess' => $dVueSuccess, 'user' => $user]);
    }

    /**
     * @throws Exception
     */
    private function pageSuperUtilisateur($dVueErreur = NULL)
    {
        $this->_manager = new UserManager();
        $user = $this->_manager->getOneUser("pseudo", Nettoyage::clearString($_SESSION['username']));
        $this->_view = new View("SuperUtilisateur");
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
                    $i = 1;
                    while (file_exists($dirpath . $tmp)) {
                        $tmp = Nettoyage::SupExt($_FILES['avatar']['name']) . $i . '.' . (new SplFileInfo($_FILES['avatar']['name']))->getExtension();
                        $i++;
                    }
                    move_uploaded_file($_FILES['avatar']['tmp_name'], $dirpath . $tmp);
                    if($_SESSION['imgProfil'] != null)
                        unlink($dirpath . $_SESSION['imgProfil']);
                    $this->_manager = new UserManager();
                    $this->_manager->addImageProfil($tmp, Nettoyage::clearString($_SESSION['username']));
                    $_SESSION['imgProfil'] = $tmp;
                    $this->pageSuperUtilisateurSuccess('Votre image de profil a été changée avec succès.');
                    return;
                }
            } else {
                $this->pageSuperUtilisateur('Erreur de téléchargement !');
                return;
            }
        } else {
            $this->pageSuperUtilisateur('Erreur, vous n\'êtes pas connecté !');
            return;
        }
        $this->pageSuperUtilisateur('Le type d\'image séléctionnée n\'est pas pris en compte.');

    }

    /**
     * @throws Exception
     */
    private function suppImageProfil()
    {
        $this->_manager = new UserManager();
        $this->_manager->suppImgProfil(Nettoyage::clearString($_SESSION['username']));
        unlink(Nettoyage::clearString(realpath(dirname(getcwd())) . '/Enigma/dist/image/' . $_SESSION['imgProfil']));
        $_SESSION['imgProfil'] = null;
        $this->pageDesGroupeSuccess('Votre image de profil a bien été supprimée.');
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
        $this->_view = new View('PageGroupeAdmin');
        $this->_view->generate(['dVueSuccess' => $dVueSuccess, 'nbGrp' => $nbGrp, 'groupes' => $groupes, 'myGroups' => $myGroups]);
    }

    /**
     * @throws Exception
     */
    private function creerGroupe()
    {
        $mdp = Nettoyage::clearString($_POST['txtMdpGrp']);
        $mdpConfirm = Nettoyage::clearString($_POST['txtMdpConfirmGrp']);
        $nomGroupe = Nettoyage::clearString($_POST['txtNomGrp']);
        $pseudo = Nettoyage::clearString($_SESSION['username']);
        if ($mdp == $mdpConfirm) {
            $this->_manager = new GroupeManager();
            $this->_manager->createGroupe($pseudo, $nomGroupe, $mdp);
            $this->pageDesGroupeSuccess('Vous avez bien créé un groupe.');
            return;
        }
        $this->pageDesGroupe('Les deux mots de passe saisis ne correspondent pas.');
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
        $this->_view = new View('PageGroupeAdmin');
        $this->_view->generate(['dVueErreur' => $dVueErreur, 'nbGrp' => $nbGrp, 'groupes' => $groupes, 'myGroups' => $myGroups]);
    }

    /**
     * @throws Exception
     */
    private
    function suppGrp()
    {
        $id = Nettoyage::clearString($_GET['id']);
        $chef = Nettoyage::clearString($_GET['chef']);
        $mdp = Nettoyage::clearString($_POST['txtMdpGrp']);
        $mdpConfirm = Nettoyage::clearString($_POST['txtMdpConfirmGrp']);
        if ($mdp == $mdpConfirm) {
            $this->_manager = new GroupeManager();
            $groupe = $this->_manager->getOneByName($id, $chef);
            if (password_verify($mdp, $groupe[0]->getMdp())) {
                $this->_manager->deleteGroupe($id, $chef);
                $this->_manager->deleteMembersByGrpId($id, $chef);
                $this->pageDesGroupeSuccess('Le groupe a bien été supprimé.');
            } else {
                $this->pageGroupeAdmin($id, 'Le mot de passe saisi ne correspond pas avec le mot de passe du groupe.');
            }
            return;
        }
        $this->pageGroupeAdmin($id, 'Les deux mots de passe saisis ne correspondent pas.');
    }

    /**
     * @throws Exception
     */
    private function pageGroupeAdmin($id, $dVueErreur = null)
    {
        if (isset($_SESSION['username'])) {
            if (isset($_GET['chef'])) {
                $this->_manager = new GroupeManager();
                $groupe = $this->_manager->getOneByName($id, Nettoyage::clearString($_GET['chef']));
                if (Nettoyage::clearString($_SESSION['username']) != $groupe[0]->getNomGroupe()) {
                    $members = $this->_manager->getMembers($id, Nettoyage::clearString($_GET['chef']));
                    $this->_view = new View("GroupeAdmin");
                    $this->_view->generate(['dVueErreur' => $dVueErreur, 'groupe' => $groupe, 'members' => $members]);
                    return;
                }
                throw new Exception('Vous ne pouvez pas accéder à cette page car vous n\'êtes pas le chef de ce groupe.');
            }
            throw new Exception('Erreur : vous ne pouvez pas accéder à cette page de cette manière.');
        }
        throw new Exception('Veuillez vous connecter pour accéder à cette page.');
    }

    /**
     * @throws Exception
     */
    private
    function exclureMembreGrp()
    {
        $username = Nettoyage::clearString($_POST['username']);
        $id = Nettoyage::clearString($_GET['id']);
        $chef = Nettoyage::clearString($_GET['chef']);
        $this->_manager = new GroupeManager();
        $this->_manager->exclureUser($id, $username, $chef);
        $this->pageGroupeAdminSuccess($id, 'Ce membre a bien été exclu.');
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
    private function reinitMdpGrp()
    {
        $destinataire = Nettoyage::clearEmail($_SESSION['email']);
        $pseudo = Nettoyage::clearString($_SESSION['username']);
        $this->_manager = new UserManager();
        if ($this->_manager->exist("mail", $destinataire)) {
            $token = uniqid();
            $this->_manager->insererUrl($token, $pseudo, "reinitMdpGrp", Nettoyage::clearString($_POST['nomGroupe']));
            Envoyeur::sendEmail($pseudo, $destinataire, $token, "reinitMdpGrp");
            $this->pageGroupeAdminSuccess(Nettoyage::clearString($_POST['nomGroupe']), "Un mail vous a été envoyé pour réinitialiser le mot de passe !");
        } else {
            $this->pageGroupeAdminSuccess(Nettoyage::clearString($_POST['nomGroupe']), "Aucun utilisateur n'est enregistré avec cet email !");
        }
    }
}
