<?php

class GatewayIndice extends Gateway
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

    protected function getIndices($enigme): array
    {
        $var = [];
        $req = $this->getBdd()->prepare("SELECT * FROM indice WHERE nomEnigme = ? ORDER BY numeroIndice");
        $req->execute([$enigme]);
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $var[] = new Indice($data);
        }
        $req->closeCursor();
        return $var;
    }

    protected function modifierIndice($enigme, $indice1, $indice2, $indice3)
    {
        $req = $this->getBdd()->prepare("UPDATE indice SET contenu = ? WHERE nomEnigme = ? and numeroIndice = 1");
        $req->execute([$indice1, $enigme]);
        $req = $this->getBdd()->prepare("UPDATE indice SET contenu = ? WHERE nomEnigme = ? and numeroIndice = 2");
        $req->execute([$indice2, $enigme]);
        $req = $this->getBdd()->prepare("UPDATE indice SET contenu = ? WHERE nomEnigme = ? and numeroIndice = 3");
        $req->execute([$indice3, $enigme]);
    }
}
