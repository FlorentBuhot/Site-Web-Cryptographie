<?php

class User
{
    private $pseudo;
    private $mail;
    private $mdp;
    private $type;
    private $points;
    private $imageProfil;
    private $verif;

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
     * @return string
     */
    public function getPseudo(): string
    {
        return $this->pseudo;
    }

    /**
     * @param string $pseudo
     */
    public function setPseudo(string $pseudo)
    {
        $this->pseudo = $pseudo;
    }

    /**
     * @return string
     */
    public function getMail(): string
    {
        return $this->mail;
    }

    /**
     * @param string $mail
     */
    public function setMail(string $mail)
    {
        $this->mail = $mail;
    }

    /**
     * @return string
     */
    public function getMdp(): string
    {
        return $this->mdp;
    }

    /**
     * @param string $mdp
     */
    public function setMdp(string $mdp)
    {
        $this->mdp = $mdp;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * @param mixed $points
     */
    public function setPoints($points)
    {
        $this->points = $points;
    }

    /**
     * @return mixed
     */
    public function getImageProfil()
    {
        return $this->imageProfil;
    }

    /**
     * @param mixed $imageProfil
     */
    public function setImageProfil($imageProfil)
    {
        $this->imageProfil = $imageProfil;
    }

    /**
     * @return mixed
     */
    public function getVerif()
    {
        return $this->verif;
    }

    /**
     * @param mixed $verif
     */
    public function setVerif($verif)
    {
        $this->verif = $verif;
    }
}