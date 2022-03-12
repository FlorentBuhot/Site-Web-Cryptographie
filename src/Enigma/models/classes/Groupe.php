<?php

class Groupe
{
    private $nomGroupe;
    private $mdp;
    private $pseudoChef;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }


    public function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            $metode = 'set' . ucfirst($key);
            if (method_exists($this, $metode))
                $this->$metode($value);
        }
    }

    /**
     * @return mixed
     */
    public function getNomGroupe()
    {
        return $this->nomGroupe;
    }

    /**
     * @param mixed $nomGroupe
     */
    public function setNomGroupe($nomGroupe)
    {
        $this->nomGroupe = $nomGroupe;
    }

    /**
     * @return mixed
     */
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * @param mixed $mdp
     */
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;
    }

    /**
     * @return mixed
     */
    public function getPseudoChef()
    {
        return $this->pseudoChef;
    }

    /**
     * @param mixed $pseudoChef
     */
    public function setPseudoChef($pseudoChef)
    {
        $this->pseudoChef = $pseudoChef;
    }
}