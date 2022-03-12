<?php

class ControllerAdmin
{
    private $_view;
    private $_manager;

    /**
     * @throws Exception
     */
    public function __construct($url)
    {
        if (isset($url) && count([$url]) > 1) throw new Exception('Page introuvable');

        $action = Nettoyage::clearString((array_key_exists('action', $_REQUEST) ? $_REQUEST['action'] : ""));
        if ($action != "") {
            switch ($action) {
                case "formReinitMdp":
                    $this->resetMdp();
                    return;
                case "formSuppUser":
                    $this->supprUser();
                    return;
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
                case "formChangeRole":
                    $this->changerRole();
                    return;
            }
        }

        if (isset($url)) {
            switch ($url) {
                case "pageAdmin":
                    $this->pageAdmin();
                    return;
                case "gestionUtilisateurA":
                    $this->pageGestionUtilisateur();
                    return;
            }
        }
        throw new Exception("La page que vous recherchez n'existe plus où est introuvable, veuillez retourner à l'accueil du site !");
    }

    /**
     * @throws Exception
     */
    private function resetMdp()
    {
        $login = Nettoyage::clearString($_POST['txtNom']);
        $this->_manager = new SuperAdminManager();
        $this->_manager->resetMdpManager($login);
        $this->pageGestionUtilisateur();
    }

    /**
     * @throws Exception
     */
    private function pageGestionUtilisateur()
    {
        $this->_manager = new AdminManager();
        $users = $this->_manager->getAllUser();
        $this->_view = new View("AdminUtilisateur");
        $this->_view->generate(['users' => $users]);
    }

    /**
     * @throws Exception
     */
    private function supprUser()
    {
        $login = Nettoyage::clearString($_POST['txtNom']);
        $this->_manager = new SuperAdminManager();
        $this->_manager->supprimerLogin($login);
        $this->pageGestionUtilisateur();
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
        $this->pageAdminSuccess("Un mail de réinitialisation a bien été envoyé !");
    }

    /**
     * @throws Exception
     */
    private function pageAdminSuccess($dVueSuccess = NULL)
    {
        $this->_manager = new UserManager();
        $user = $this->_manager->getOneUser("pseudo", Nettoyage::clearString($_SESSION['username']));
        $this->_manager = new GroupeManager();
        $nbGrp = $this->_manager->getNombreGroupe(Nettoyage::clearString($_SESSION['username']));
        $groupes = $this->_manager->getGroupByPseudo(Nettoyage::clearString($_SESSION['username']));
        $myGroups = $this->_manager->getMyGroups(Nettoyage::clearString($_SESSION['username']));
        $this->_view = new View("Admin");
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
                $this->pageAdminSuccess(["Un mail vous a été envoyé pour confirmer la suppression de votre compte !"]);
            } else
                $this->pageAdmin("Les deux mots de passe ne correspondent pas.");
        } else
            $this->pageAdmin('Le mot de passe renseigné n\'est pas correct.');
    }

    /**
     * @throws Exception
     */
    private function pageAdmin($dVueErreur = NULL)
    {
        $this->_manager = new UserManager();
        $user = $this->_manager->getOneUser("pseudo", Nettoyage::clearString($_SESSION['username']));
        $this->_manager = new GroupeManager();
        $nbGrp = $this->_manager->getNombreGroupe(Nettoyage::clearString($_SESSION['username']));
        $groupes = $this->_manager->getGroupByPseudo(Nettoyage::clearString($_SESSION['username']));
        $myGroups = $this->_manager->getMyGroups(Nettoyage::clearString($_SESSION['username']));
        $this->_view = new View("Admin");
        $this->_view->generate(['dVueErreur' => $dVueErreur, 'user' => $user, 'nbGrp' => $nbGrp, 'groupes' => $groupes, 'myGroups' => $myGroups]);
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
                    $this->pageAdminSuccess('Votre image de profil a été changée avec succès.');
                    return;
                }
            } else {
                $this->pageAdmin('Erreur de téléchargement !');
                return;
            }
        } else {
            $this->pageAdmin('Erreur, vous n\'êtes pas connecté !');
            return;
        }
        $this->pageAdmin('Le type d\'image séléctionnée n\'est pas pris en compte.');

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
        $this->pageAdminSuccess('Votre image de profil a bien été supprimée.');
    }

    /**
     * @throws Exception
     */
    private function changerRole()
    {
        $login = Nettoyage::clearString($_POST['txtNom']);
        $role = Nettoyage::clearString($_POST['newType']);
        $this->_manager = new AdminManager();
        $this->_manager->changerRole($login, $role);
        $this->pageGestionUtilisateur();
    }
}
