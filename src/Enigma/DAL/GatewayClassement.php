<?php

class GatewayClassement extends Gateway
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

    protected function insertTime($temps, $nomEnigme, $pseudo, $difficulte)
    {
        if ($temps != NULL) {
            $req = $this->con->prepare("INSERT INTO ligne_classement(pseudo,nomEnigme,difficulte,temps) VALUES (?,?,?,?)");
            $req->execute(array($pseudo, $nomEnigme, $difficulte, $temps));
        }
    }

    protected function getOneTime($nomEnigme, $pseudo, $difficulte): ?array
    {
        $var = [];
        $req = $this->con->prepare("SELECT * FROM ligne_classement WHERE nomEnigme = ? AND pseudo = ? AND difficulte = ?");
        $req->execute(array($nomEnigme, $pseudo, $difficulte));
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $var[] = new LigneClassement($data);
        }
        if (!count($var) == 1) {
            return NULL;
        }
        $req->closeCursor();
        return $var;
    }

    protected function getAllTime($nomEnigme): array
    {
        $var = [];
        $req = $this->con->prepare("SELECT * FROM ligne_classement WHERE nomEnigme = ? ORDER BY temps ");
        $req->execute(array($nomEnigme));
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $var[] = new LigneClassement($data);
        }
        $req->closeCursor();
        return $var;
    }

    protected function getAllTimeByNiveau($nomEnigme, $difficulte, $page, $nbClassment): array
    {
        $var = [];
        $req = $this->con->prepare("SELECT * FROM ligne_classement WHERE nomEnigme = ? AND difficulte = ? ORDER BY temps LIMIT ?, ?");
        $req->execute(array($nomEnigme, $difficulte, ceil(($page - 1) * $nbClassment), $nbClassment));
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $var[] = new LigneClassement($data);
        }
        $req->closeCursor();
        return $var;
    }

    protected function getAllTimeByNiveauAndGroup($nomEnigme, $difficulte, $group, $page, $nbClassment): array
    {
        $var = [];
        $req = $this->con->prepare("SELECT * FROM ligne_classement WHERE nomEnigme = ? AND difficulte = ? AND pseudo IN (SELECT pseudo FROM fait_partie_de WHERE nomGroupe = ?) ORDER BY temps LIMIT ?, ?");
        $req->execute(array($nomEnigme, $difficulte, $group, ceil(($page - 1) * $nbClassment), $nbClassment));
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $var[] = new LigneClassement($data);
        }
        $req->closeCursor();
        return $var;
    }

    protected function getAllPointsByNiveau($page, $nbClassment): array
    {
        $var = [];
        $req = $this->con->prepare("SELECT * FROM users ORDER BY points DESC LIMIT ?, ?");
        $req->execute(array(ceil(($page - 1) * $nbClassment), $nbClassment));
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $var[] = new User($data);
        }
        $req->closeCursor();
        return $var;
    }

    protected function getAllPointsByNiveauAndGroup($group, $page, $nbClassment): array
    {
        $var = [];
        $req = $this->con->prepare("SELECT * FROM users  WHERE pseudo IN (SELECT pseudo FROM fait_partie_de WHERE nomGroupe = ?) ORDER BY points DESC LIMIT ?, ?");
        $req->execute(array($group, ceil(($page - 1) * $nbClassment), $nbClassment));
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $var[] = new User($data);
        }
        $req->closeCursor();
        return $var;
    }

    protected function getNbUserByNiveau($nomEnigme, $difficulte)
    {
        $var = [];
        $req = $this->con->prepare("SELECT COUNT(*) FROM ligne_classement WHERE nomEnigme = ? AND difficulte = ?");
        $req->execute(array($nomEnigme, $difficulte));
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $var[] = $data;
        }
        $req->closeCursor();
        return $var[0][0];

    }

    protected function changeTime($temps, $idEnigme, $pseudo, $difficulte)
    {
        if ($temps != NULL) {
            $req = $this->con->prepare("UPDATE ligne_classement SET temps = ? WHERE pseudo = ? AND nomEnigme = ? AND difficulte = ?");
            $req->execute([$temps, $pseudo, $idEnigme, $difficulte]);
        }
    }

    protected function timeExist($nomEnigme, $pseudo, $difficulte): bool
    {
        $var = [];
        $req = $this->con->prepare("SELECT * FROM ligne_classement WHERE nomEnigme = ? AND pseudo = ? AND difficulte = ?");
        $req->execute([$nomEnigme, $pseudo, $difficulte]);
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $var[] = new LigneClassement($data);
        }
        if (!empty($var))
            return true;
        else
            return false;
    }

    protected function getAllTimeByEnigmeAndUser($nomEnigme, $pseudo): array
    {
        $var = [];
        $req = $this->con->prepare("SELECT * FROM ligne_classement WHERE nomEnigme = ? AND pseudo = ? ORDER BY temps");
        $req->execute(array($nomEnigme, $pseudo));
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $var[] = new LigneClassement($data);
        }
        $req->closeCursor();
        return $var;
    }

    protected function getAllByUsername($username): array
    {
        $var = [];
        $req = $this->con->prepare("SELECT * FROM ligne_classement WHERE pseudo = ?");
        $req->execute([$username]);
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $var [] = new LigneClassement($data);
        }
        return $var;
    }
}