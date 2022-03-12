<?php

class Routeur
{
    private $_ctrl;
    private $_view;

    /**
     * @throws Exception
     */
    public function routeReq()
    {
        $listeAction = ["Visiteur" => ["accueil", "connexion", "inscription", "reinitMdp", "leaderboard",
            "leaderboardEnigme", "pagePrincipale", "malleable", "OTP", "permutation", "bitcoin", "ADFGVX", "substitution", "solidite", "shamir", "choixClassement"],
            "User" => ["deconnexion", "pageUser", "groupe", "pageGroupe"],
            "SuperUser" => ["pageSuperUser", "groupeAdmin", "pageGroupeAdmin"],
            "Admin" => ["pageAdmin", "gestionUtilisateurA"],
            "SuperAdmin" => ["pageSuperAdmin", "gestionUtilisateurSA", "gestionIndices"]];

        ClearUrl::delUrl();

        try {
            //Le controlleur est inclus selon l'action de l'utilisateur
            if (isset($_GET['url'])) {
                $url = Nettoyage::clearString($_GET['url']);
                if (in_array($url, $listeAction["User"])) $controller = "User";
                else if (in_array($url, $listeAction["SuperUser"])) $controller = "SuperUser";
                else if (in_array($url, $listeAction["Admin"])) $controller = "Admin";
                else if (in_array($url, $listeAction["SuperAdmin"])) $controller = "SuperAdmin";
                else $controller = "Visiteur";

                if (!isset($controller)) throw new Exception("La page que vous recherchez n'existe plus où est introuvable, veuillez retourner à l'accueil du site !");

                if ($controller != "Visiteur") {
                    if (!isset($_SESSION['type']) && $url != "register") $url = "connexion";
                    else if ($controller == "SuperUser" and ($_SESSION['type'] != 'admin' and $_SESSION['type'] != 'super-admin' and $_SESSION['type'] != 'super-user'))
                        throw new Exception("Vous n'avez pas les droits nécessaires pour accéder à cette page !");
                    else if ($controller == "Admin" and ($_SESSION['type'] != 'admin' and $_SESSION['type'] != 'super-admin'))
                        throw new Exception("Vous n'avez pas les droits nécessaires pour accéder à cette page !");
                    else if ($controller == "SuperAdmin" and $_SESSION['type'] != 'super-admin')
                        throw new Exception("Vous n'avez pas les droits nécessaires pour accéder à cette page !");
                }

                $controllerClass = "Controller" . $controller;
                $controllerFile = "./controllers/" . $controllerClass . ".php";

                if (file_exists($controllerFile)) {
                    $this->_ctrl = new $controllerClass($url);
                } else throw new Exception("La page que vous recherchez n'existe plus où est introuvable, veuillez retourner à l'accueil du site !");
            } else $this->_ctrl = new ControllerVisiteur("");
        } catch (Exception $e) {
            $errorMsg = $e->getMessage();
            $this->_view = new View("Erreur");
            $this->_view->generate(['errorMsg' => $errorMsg]);
        }
    }
}