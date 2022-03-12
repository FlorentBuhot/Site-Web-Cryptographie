<?php

class GatewaySuperAdmin extends Gateway
{
    private $con;

    /**
     * Constructeur d'une gateway d'utilisateur.
     */
    public function __construct()
    {
        $this->con = $this->getBdd();
        $this->con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if ($this->con == false) {
            die("ERREUR: Impossible de se connecter à la base de données. ");
        }
    }

    protected function getAllUser(): array
    {
        $var = [];
        $req = $this->con->prepare("SELECT * FROM users where type != 'super-admin' ORDER BY type,pseudo");
        $req->execute();
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $var[] = new User($data);
        }
        $req->closeCursor();
        return $var;
    }

    protected function resetMdp($login)
    {
        $req = $this->con->prepare("UPDATE users SET mdp = ? WHERE pseudo = ?");
        $req->execute([password_hash($login, PASSWORD_DEFAULT), $login]);
    }

    /**
     * Méthode permettant de supprimer un utilisateur par login.
     * @param $login
     */
    protected function suppOneCompte($login)
    {
        $req = $this->con->prepare("DELETE FROM users WHERE pseudo = ?");
        $req->execute([$login]);
        $req = $this->con->prepare("DELETE FROM groupe WHERE pseudoChef = ?");
        $req->execute([$login]);
        $req = $this->con->prepare("DELETE FROM fait_partie_de WHERE pseudo = ? or pseudoChef = ?");
        $req->execute([$login, $login]);
        $req = $this->con->prepare("DELETE FROM ligne_classement WHERE pseudo = ?");
        $req->execute([$login]);
    }

    protected function changeRole($login, $role)
    {
        $req = $this->con->prepare("UPDATE users SET type = ? WHERE pseudo = ?");
        $req->execute([$role, $login]);
    }
}