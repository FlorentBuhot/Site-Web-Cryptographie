<?php

class GatewayGroupe extends Gateway
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

    /**
     * @param string $pseudo
     * @param string $nomGroupe
     * @param string $mdp
     * @return void
     */
    protected function createOneGroupe(string $pseudo, string $nomGroupe, string $mdp)
    {
        $req = $this->con->prepare("INSERT INTO groupe(nomGroupe, mdp, pseudoChef) VALUES (?,?,?)");
        $req->execute([$nomGroupe, password_hash($mdp, PASSWORD_DEFAULT), $pseudo]);
        $this->joinOneGroupe($pseudo, $nomGroupe, $pseudo);
    }

    protected function joinOneGroupe(string $username, string $id, string $pseudoChef)
    {
        $req = $this->getBdd()->prepare("INSERT INTO fait_partie_de VALUES(?,?,?)");
        $req->execute([$username, $id, $pseudoChef]);
    }

    protected function getAllGroupesByChef(string $pseudo): array
    {
        $var = [];
        $req = $this->con->prepare("SELECT * FROM groupe WHERE pseudoChef = ?");
        $req->execute([$pseudo]);
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $var[] = new Groupe($data);
        }
        $req->closeCursor();
        return $var;
    }

    protected function getNbGrp(string $pseudo): array
    {
        $var = [];
        $req = $this->con->prepare("SELECT COUNT(*) FROM groupe WHERE pseudoChef = ?");
        $req->execute([$pseudo]);
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $var[] = $data;
        }
        $req->closeCursor();
        return $var;
    }

    /**
     * @throws Exception
     */
    protected function getOneGroupe(string $name, string $pseudoChef): array
    {
        $var = [];
        $req = $this->getBdd()->prepare("SELECT * FROM groupe WHERE nomGroupe = ? and pseudoChef = ?");
        $req->execute([$name, $pseudoChef]);
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $var[] = new Groupe($data);
        }
        $req->closeCursor();
        return $var;
    }

    protected function getAllMembers(string $name, string $chef): array
    {
        $var = [];
        $req = $this->getBdd()->prepare("SELECT * FROM fait_partie_de WHERE nomGroupe = ? and pseudoChef = ?");
        $req->execute([$name, $chef]);
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $var[] = $data;
        }
        $req->closeCursor();
        return $var;
    }

    protected function deleteOneGrp(string $id, string $chef)
    {
        $req = $this->getBdd()->prepare("DELETE FROM groupe WHERE nomGroupe = ? and pseudoChef = ?");
        $req->execute([$id, $chef]);
        $this->deleteAllMembers($id, $chef);
    }

    protected function deleteAllMembers(string $id, string $chef)
    {
        $req = $this->getBdd()->prepare("DELETE FROM fait_partie_de WHERE nomGroupe = ? and pseudoChef = ?");
        $req->execute([$id, $chef]);
    }

    protected function modifiyPasswordGrp(string $id, string $mdp, string $chef)
    {
        $req = $this->getBdd()->prepare("UPDATE groupe SET mdp = ? WHERE nomGroupe = ? and pseudoChef = ?");
        $req->execute([password_hash($mdp, PASSWORD_DEFAULT), $id, $chef]);
    }

    protected function exclureOneUser(string $id, string $username, string $chef)
    {
        $req = $this->getBdd()->prepare("DELETE FROM fait_partie_de WHERE nomGroupe = ? and pseudo = ? and pseudoChef = ?");
        $req->execute([$id, $username, $chef]);
    }

    protected function getMember(string $username, string $id, string $pseudoChef): array
    {
        $var = [];
        $req = $this->getBdd()->prepare("SELECT * FROM fait_partie_de WHERE pseudo = ? and nomGroupe = ? and pseudoChef = ?");
        $req->execute([$username, $id, $pseudoChef]);
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $var[] = $data;
        }
        $req->closeCursor();
        return $var;
    }

    protected function getAllOfMyGroups(string $username): array
    {
        $var = [];
        $req = $this->getBdd()->prepare("SELECT * FROM fait_partie_de WHERE pseudo = ?");
        $req->execute([$username]);
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $var[] = $data;
        }
        $req->closeCursor();
        return $var;
    }
}