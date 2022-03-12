<?php

class GatewayUser extends Gateway
{
    private $con;

    public function __construct()
    {
        $this->con = $this->getBdd();
        $this->con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if ($this->con == false) {
            die("ERREUR: Impossible de se connecter à la base de données. ");
        }
    }

    public function getAllUser(): array
    {
        return parent::getAll('users', 'User');
    }

    /**
     * Méthode permettant d'insérer un utilisateur dans la base données.
     * @param string $pseudo
     * @param string $mdp
     * @param string $mail
     * @param $type
     */
    public function insertOneUsr(string $pseudo, string $mdp, string $mail, $type)
    {
        $req = $this->con->prepare("INSERT INTO users(pseudo,mail,mdp,type) VALUES (?,?,?,?)");
        if ($type == NULL) {
            $req->execute([$pseudo, $mail, password_hash($mdp, PASSWORD_DEFAULT), "user"]);
        } else {
            $req->execute([$pseudo, $mail, password_hash($mdp, PASSWORD_DEFAULT), $type]);
        }

    }

    public function insererUrlBase($token, $pseudo, $fonction, $groupe)
    {
        $req = $this->con->prepare("INSERT INTO url(token,pseudo,dateCreation,fonction,groupe) VALUES(?,?,?,?,?)");
        date_default_timezone_set("Europe/Paris");
        $req->execute([$token, $pseudo, date("Y-m-d H:i:s"), $fonction, $groupe]);
    }

    public function getUrl($url): array
    {
        $var = [];
        $req = $this->con->prepare("SELECT * FROM url WHERE token = ?");
        $req->execute([$url]);
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $var[] = new Url($data);
        }
        $req->closeCursor();
        return $var;
    }

    /**
     * Méthode permettant de chercher un utilisateur dans la de données.
     * @param string $nomColonne
     * @param string $valeurColonne
     * @param string $mdp
     * @return bool
     */
    protected function chercherUser(string $nomColonne, string $valeurColonne, string $mdp): bool
    {
        $var = [];
        switch ($nomColonne) {
            case "mail":
                $req = $this->con->prepare("SELECT * FROM users WHERE mail = ?");
                $req->execute([$valeurColonne]);
                while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
                    $var[] = new User($data);
                }
                if (!$req->rowCount() == 1) {
                    return false;
                }
                $req->closeCursor();
                if (password_verify($mdp, $var[0]->getMdp())) {
                    return true;
                }
                return false;
            case "pseudo":
                $req = $this->con->prepare("SELECT * FROM users WHERE pseudo = ?");
                $req->execute([$valeurColonne]);
                while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
                    $var[] = new User($data);
                }
                if (!count($var) == 1) {
                    return false;
                }
                $req->closeCursor();
                if (password_verify($mdp, $var[0]->getMdp())) {
                    return true;
                }
                return false;
            default:
                return false;
        }
    }

    /**
     * Méthode permettant de sélectionner un utiliateur dans la de données.
     * @param string $nomColonne
     * @param string $valeurColonne
     * @return array|false
     * @throws Exception
     */
    protected function getUser(string $nomColonne, string $valeurColonne)
    {
        $var = [];
        switch ($nomColonne) {
            case "pseudo":
                $req = $this->con->prepare("SELECT * FROM users WHERE pseudo = ?");
                $req->execute([$valeurColonne]);
                while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
                    $var[] = new User($data);
                }
                if (!count($var) == 1) {
                    return false;
                }
                $req->closeCursor();
                return $var;
            case "mail":
                $req = $this->con->prepare("SELECT * FROM users WHERE mail = ?");
                $req->execute([$valeurColonne]);
                while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
                    $var[] = new User($data);
                }
                if (!count($var) == 1) {
                    return false;
                }
                $req->closeCursor();
                return $var;
            default:
                throw new Exception("Erreur lors du chargement des données.");
        }
    }

    /**
     * Méthode permettant de modifier le pseudo d'un utilisateur.
     * @param $oldNom
     * @param $newNom
     * @throws Exception
     */
    protected function modifParamPseudo($oldNom, $newNom)
    {
        if ($this->userExist("pseudo", $newNom))
            throw new Exception("Un utilisateur possède déjà ce pseudo !");
        $req = $this->con->prepare("UPDATE users SET pseudo = ? WHERE pseudo = ?");
        $req->execute([$newNom, $oldNom]);
    }

    /**
     * Méthode retournant un booléen, stipulant si un utilisateur existe dans la base de données ou non.
     * @param string $nomColonne
     * @param string $param
     * @return bool
     */
    protected function userExist(string $nomColonne, string $param): bool
    {
        $var = [];
        switch ($nomColonne) {
            case "pseudo":
                $req = $this->con->prepare("SELECT * FROM users WHERE pseudo = ?");
                $req->execute(array($param));
                while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
                    $var[] = new User($data);
                }
                if (!empty($var))
                    return true;
                else
                    return false;
            case "mail":
                $req = $this->con->prepare("SELECT * FROM users WHERE mail = ?");
                $req->execute(array($param));
                while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
                    $var[] = new User($data);
                }
                if (!empty($var))
                    return true;
                else
                    return false;
            default:
                return false;
        }
    }

    /**
     * Métohde permettant de modifier le mot de passe d'un utilisateur.
     * @param $nom
     * @param $mdp
     */
    protected function modifParamMdp($nom, $mdp)
    {
        $req = $this->con->prepare("UPDATE users SET mdp = ? WHERE pseudo = ?");
        $req->execute([$mdp, $nom]);
    }

    /**
     * Méthode permettant de supprimer un utilisateur pas id.
     * @param $pseudo
     */
    protected function SuppOneCompte($pseudo)
    {
        $req = $this->con->prepare("DELETE FROM users WHERE pseudo = ?");
        $req->execute([$pseudo]);
        $req = $this->con->prepare("DELETE FROM groupe WHERE pseudoChef = ?");
        $req->execute([$pseudo]);
        $req = $this->con->prepare("DELETE FROM fait_partie_de WHERE pseudo = ? or pseudoChef = ?");
        $req->execute([$pseudo, $pseudo]);
        $req = $this->con->prepare("DELETE FROM ligne_classement WHERE pseudo = ?");
        $req->execute([$pseudo]);
    }

    protected function modifPoints($pseudo, $points)
    {
        $req = $this->con->prepare("UPDATE users SET points = ? WHERE pseudo = ?");
        $req->execute([$points, $pseudo]);
    }

    protected function validerUser($pseudo)
    {
        $req = $this->con->prepare("UPDATE users SET verif = 1 WHERE pseudo = ?");
        $req->execute([$pseudo]);
    }

    protected function suprUrlUser($pseudo)
    {
        $req = $this->con->prepare("DELETE FROM url WHERE pseudo = ?");
        $req->execute([$pseudo]);
    }

    protected function getAllUrl(): array
    {
        $var = [];
        $req = $this->con->prepare("SELECT * FROM url");
        $req->execute([]);
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $var[] = new Url($data);
        }
        $req->closeCursor();
        return $var;
    }

    protected function modifImageProfil($image, $pseudo)
    {
        $req = $this->con->prepare("UPDATE users SET imageProfil = ? WHERE pseudo = ?");
        $req->execute([$image, $pseudo]);
    }


    protected function SupprimerImageProfil($pseudo)
    {
        $req = $this->con->prepare("UPDATE users SET imageProfil = null WHERE pseudo = ?");
        $req->execute([$pseudo]);
    }

    protected function getUserParMail($mail)
    {
        $var = [];
        $req = $this->con->prepare("SELECT * FROM users where mail = ?");
        $req->execute([$mail]);
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $var[] = new User($data);
        }
        $req->closeCursor();
        return $var;
    }
}