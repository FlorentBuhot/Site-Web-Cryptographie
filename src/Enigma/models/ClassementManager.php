<?php

class ClassementManager extends GatewayClassement
{
    public function getAllTempsByEnigme($idEnigme): array
    {
        return $this->getAllTime($idEnigme);
    }

    public function ajoutTemps($temps, $nomEnigme, $pseudo, $difficulte)
    {
        if ($this->timeExist($nomEnigme, $pseudo, $difficulte)) {
            $oldTemps = $this->getTempsByUserEnigme($nomEnigme, $pseudo, $difficulte);
            if ($temps < $oldTemps[0]->getTemps() && isset($oldTemps)) {
                $this->changerTemps($temps, $nomEnigme, $pseudo, $difficulte);
            }
        } else {
            $this->insertTemps($temps, $nomEnigme, $pseudo, $difficulte);
        }
    }

    public function getTempsByUserEnigme($nomEnigme, $pseudo, $difficulte): ?array
    {
        return $this->getOneTime($nomEnigme, $pseudo, $difficulte);
    }

    public function changerTemps($temps, $nomEnigme, $pseudo, $difficulte)
    {
        $this->changeTime($temps, $nomEnigme, $pseudo, $difficulte);
    }

    public function insertTemps($temps, $nomEnigme, $pseudo, $difficulte)
    {
        $this->insertTime($temps, $nomEnigme, $pseudo, $difficulte);
    }

    public function getAllTimeByNiveauEnigme($nomEnigme, $difficulte, $page, $nbClassment): array
    {
        return $this->getAllTimeByNiveau($nomEnigme, $difficulte, $page, $nbClassment);
    }

    public function getAllTimeByNiveauEnigmeAndGroup($nomEnigme, $difficulte, $group, $page, $nbClassment): array
    {
        return $this->getAllTimeByNiveauAndGroup($nomEnigme, $difficulte, $group, $page, $nbClassment);
    }

    public function getAllPointsByNiveauEnigme($page, $nbClassment): array
    {
        return $this->getAllPointsByNiveau($page, $nbClassment);
    }

    public function getAllPointsByNiveauEnigmeAndGroup($group, $page, $nbClassment): array
    {
        return $this->getAllPointsByNiveauAndGroup($group, $page, $nbClassment);
    }

    public function getNbAllTimeByNiveauEnigme($nomEnigme, $difficulte)
    {
        return $this->getNbUserByNiveau($nomEnigme, $difficulte);
    }

    public function getAllTimeByEnigmeAndPseudo($nomEnigme, $pseudo): array
    {
        return $this->getAllTimeByEnigmeAndUser($nomEnigme, $pseudo);
    }

    public function getAllByUser($username): array
    {
        return $this->getAllByUsername($username);
    }


}