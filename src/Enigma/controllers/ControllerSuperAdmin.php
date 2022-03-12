<?php

class ControllerSuperAdmin
{
    private $_view;
    private $_manager;

    /**
     * @throws Exception
     */
    public function __construct($url)
    {
        if (isset($url) && count(array($url)) > 1) throw new Exception('Page introuvable');

        $action = Nettoyage::clearString((array_key_exists('action', $_REQUEST) ? $_REQUEST['action'] : ""));
        if ($action != "") {
            switch ($action) {
                case "formChangeRole":
                    $this->changerRole();
                    return;
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
                case "choixIndice":
                    $this->pageGestionIndices();
                    return;
                case "formModifIndice":
                    $this->modifierIndice();
                    return;
            }
        } else {
            switch ($url) {
                case 'pageSuperAdmin':
                    $this->pageSuperAdmin();
                    return;
                case "gestionUtilisateurSA":
                    $this->pageGestionUtilisateur();
                    return;
                case "gestionIndices":
                    $this->pageGestionIndices();
                    return;
            }
        }
        throw new Exception("La page que vous recherchez n'existe plus où est introuvable, veuillez retourner à l'accueil du site !");
    }

    /**
     * @throws Exception
     */
    private function changerRole()
    {

        $login = Nettoyage::clearString($_POST['txtNom']);
        $role = Nettoyage::clearString($_POST['newType']);
        $this->_manager = new SuperAdminManager();
        $this->_manager->changerRole($login, $role);
        $this->pageGestionUtilisateur();
    }

    /**
     * @throws Exception
     */
    private function pageGestionUtilisateur()
    {
        $this->_manager = new SuperAdminManager();
        $users = $this->_manager->getAllUser();
        $this->_view = new View("SuperAdminUtilisateur");
        $this->_view->generate(['users' => $users]);
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
        $this->pageSuperAdminSuccess("Un mail de réinitialisation a bien été envoyé !");
    }

    /**
     * @throws Exception
     */
    private function pageSuperAdminSuccess($dVueSuccess = NULL)
    {
        $this->_manager = new UserManager();
        $user = $this->_manager->getOneUser("pseudo", Nettoyage::clearString($_SESSION['username']));
        $this->_manager = new GroupeManager();
        $nbGrp = $this->_manager->getNombreGroupe(Nettoyage::clearString($_SESSION['username']));
        $groupes = $this->_manager->getGroupByPseudo(Nettoyage::clearString($_SESSION['username']));
        $myGroups = $this->_manager->getMyGroups(Nettoyage::clearString($_SESSION['username']));
        $this->_view = new View("SuperAdmin");
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
                $this->pageSuperAdminSuccess(["Un mail vous a été envoyé pour confirmer la suppression de votre compte !"]);
            } else
                $this->pageSuperAdmin("Les deux mots de passe ne correspondent pas.");
        } else
            $this->pageSuperAdmin('Le mot de passe renseigné n\'est pas correct.');
    }

    /**
     * @throws Exception
     */
    private function pageSuperAdmin($dVueErreur = NULL)
    {
        $this->_manager = new UserManager();
        $user = $this->_manager->getOneUser("pseudo", Nettoyage::clearString($_SESSION['username']));
        $this->_manager = new GroupeManager();
        $nbGrp = $this->_manager->getNombreGroupe(Nettoyage::clearString($_SESSION['username']));
        $groupes = $this->_manager->getGroupByPseudo(Nettoyage::clearString($_SESSION['username']));
        $myGroups = $this->_manager->getMyGroups(Nettoyage::clearString($_SESSION['username']));
        $this->_view = new View("SuperAdmin");
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
                    if($_SESSION['imgProfil'] != null) {
                        unlink($dirpath . $_SESSION['imgProfil']);
                    }
                    $this->_manager = new UserManager();
                    $this->_manager->addImageProfil($tmp, Nettoyage::clearString($_SESSION['username']));
                    $_SESSION['imgProfil'] = $tmp;
                    $this->pageSuperAdminSuccess('Votre image de profil a été changée avec succès.');
                    return;
                }
            } else {
                $this->pageSuperAdmin('Erreur de téléchargement !');
                return;
            }
        } else {
            $this->pageSuperAdmin('Erreur, vous n\'êtes pas connecté !');
            return;
        }
        $this->pageSuperAdmin('Le type d\'image sélectionnée n\'est pas pris en compte.');

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
        $this->pageSuperAdminSuccess('Votre image de profil a bien été supprimée.');
    }

    /**
     * @throws Exception
     */
    private function pageGestionIndices()
    {
        $this->_manager = new IndiceManager();
        $selected = isset($_POST['choix']) ? Nettoyage::clearString($_POST['choix']) : "melimelo";
        $selectedNiveau = isset($_POST['niveau']) ? Nettoyage::clearInt($_POST['niveau']) : "1";
        $indices = $this->_manager->getIndicesByEnigme($selected);
        $this->_view = new View("SuperAdminIndices");
        $this->_view->generate(['dVueErreur' => NULL, 'selected' => $selected, 'selectedNiveau' => $selectedNiveau, 'indices' => $indices]);
    }

    /**
     * @throws Exception
     */
    private function modifierIndice()
    {
        $indice1 = $_POST['indice1'];
        $indice2 = $_POST['indice2'];
        $indice3 = $_POST['indice3'];
        $selected = $_POST['selected'];
        $this->_manager = new IndiceManager();
        $this->_manager->modifierIndiceEnigme($selected, $indice1, $indice2, $indice3);
        $this->pageGestionIndicesSuccess('Les indices ont bien été modifiés.');
    }

    /**
     * @throws Exception
     */
    private function pageGestionIndicesSuccess($dVueSuccess = NULL)
    {
        $this->_manager = new IndiceManager();
        $selected = isset($_POST['choix']) ? Nettoyage::clearString($_POST['choix']) : "melimelo";
        $selectedNiveau = isset($_POST['niveau']) ? Nettoyage::clearInt($_POST['niveau']) : "1";
        $indices = $this->_manager->getIndicesByEnigme($selected);
        $this->_view = new View("SuperAdminIndices");
        $this->_view->generate(['dVueSuccess' => $dVueSuccess, 'selected' => $selected, 'selectedNiveau' => $selectedNiveau, 'indices' => $indices]);
    }


}