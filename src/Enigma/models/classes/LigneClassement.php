<?php

class LigneClassement
{
    private $pseudo;
    private $nomEnigme;
    private $difficulte;
    private $temps;

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
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * @param mixed $pseudo
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
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
    public function getDifficulte()
    {
        return $this->difficulte;
    }

    /**
     * @param mixed $difficulte
     */
    public function setDifficulte($difficulte)
    {
        $this->difficulte = $difficulte;
    }

    /**
     * @return string
     */
    public function getTemps(): string
    {
        if ($this->temps < 60) {
            return $this->temps . 's';
        } elseif ($this->temps < 3600) {
            return (int)($this->temps / 60) . "m" . ($this->temps % 60) . "s";
        } else {
            return (int)($this->temps / 3600) . "h" . (int)(($this->temps - 3600 * (int)($this->temps / 3600)) / 60) . "m" . ($this->temps % 60) . "s";
        }
    }

    /**
     * @param mixed $temps
     */
    public function setTemps($temps)
    {
        $this->temps = $temps;
    }

}