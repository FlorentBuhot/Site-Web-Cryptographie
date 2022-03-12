<?php

class Indice
{
    private $contenu;
    private $nomEnigme;
    private $numeroIndice;

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
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * @param mixed $contenu
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
    }

    /**
     * @return mixed
     */
    public function getNomEnigme()
    {
        return $this->nomEnigme;
    }

    /**
     * @param mixed $nomEnigme
     */
    public function setNomEnigme($nomEnigme)
    {
        $this->nomEnigme = $nomEnigme;
    }

    /**
     * @return mixed
     */
    public function getNumeroIndice()
    {
        return $this->numeroIndice;
    }

    /**
     * @param mixed $numeroIndice
     */
    public function setNumeroIndice($numeroIndice)
    {
        $this->numeroIndice = $numeroIndice;
    }

}