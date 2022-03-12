<?php

class UserManager extends GatewayUser
{

    /**
     * Méthode permettant de trouver un utilisateur avec son pseudo.
     * @param string $pseudo
     * @param string $mdp
     * @return bool
     */
    public function trouverUserParPseudo(string $pseudo, string $mdp): bool
    {
        return $this->chercherUser("pseudo", $pseudo, $mdp);
    }

    /**
     * Méthode permettant de trouver un utilisateur avec son email.
     * @param string $email
     * @param string $mdp
     * @return bool
     */
    public function trouverUserParEmail(string $email, string $mdp): bool
    {
        return $this->chercherUser("email", $email, $mdp);
    }

    /**
     * Méthode retournant un booléen en fonction de l'existance d'un utilisateur.
     * @param string $nomColonne
     * @param string $param
     * @return bool
     */
    public function exist(string $nomColonne, string $param): bool
    {
        return $this->userExist($nomColonne, $param);
    }

    /**
     * Méthode permettant d'insérer un utilisateur.
     * @param string $pseudo
     * @param string $mdp
     * @param string $email
     * @param $type
     */
    public function insertOneUser(string $pseudo, string $mdp, string $email, $type)
    {
        $this->insertOneUsr($pseudo, $mdp, $email, $type);
    }

    /**
     * Méthode permettant de modifier le mot de passe d'un utilisateur.
     * @param $nom
     * @param $mdp
     */
    public function modifMdp($nom, $mdp)
    {
        $this->modifParamMdp($nom, $mdp);
    }

    public function attributePoints($niveau, $diff): int
    {
        $points = 0;
        switch ($niveau) {
            case 1:
                $points = 100;
                break;
            case 2:
                $points = 150;
                break;
            case 3:
                $points = 200;
                break;
            default:
                break;
        }

        switch ($diff) {
            case 2:
                $points *= 2;
                break;
            case 3:
                $points *= 4;
                break;
            default:
                break;
        }

        return $points;
    }

    /**
     * @throws Exception
     */
    public function updatePoints(string $op, $pseudo, $points)
    {
        $user = $this->getOneUser("pseudo", $pseudo);
        $oldPoints = $user[0]->getPoints();
        switch ($op) {
            case "+":
                $newPoints = $oldPoints + $points;
                $this->modifPoints($pseudo, $newPoints);
                return;
            case "-":
                $newPoints = $oldPoints - $points;
                $this->modifPoints($pseudo, $newPoints);
                return;
        }
    }

    /**
     * Fonction permettant de trouver un utilisateur.
     * @param string $nomColonne
     * @param string $param
     * @return array|false
     * @throws Exception
     */
    public function getOneUser(string $nomColonne, string $param)
    {
        return $this->getUser($nomColonne, $param);
    }

    public function verificationUrl($url): array
    {
        return $this->getUrl($url);
    }

    public function validerUserMdl($pseudo)
    {
        $this->validerUser($pseudo);
    }

    public function delAllUrlUser($pseudo)
    {
        $this->suprUrlUser($pseudo);
    }

    public function clearUrl()
    {
        $tab = $this->getAllUrl();
        foreach ($tab as $url) {
            if ((strtotime(date("Y-m-d H:i:s")) - strtotime($url->getDateCreation())) > 600) {
                $this->suprUrlUser($url->getPseudo());
                $user = $this->getOneUser('pseudo', $url->getPseudo());
                $user = $user[0];
                if ($user->getVerif() == 0) {
                    $this->SupprimerCompte($url->getPseudo());
                }
            }
        }
    }

    /**
     * Méthode permettant de supprimer un utilisateur par id.
     * @param $pseudo
     */
    public function SupprimerCompte($pseudo)
    {
        $this->SuppOneCompte($pseudo);
    }

    public function addImageProfil($image, $pseudo)
    {
        $this->modifImageProfil($image, $pseudo);
    }

    public function suppImgProfil($pseudo)
    {
        $this->SupprimerImageProfil($pseudo);
    }

    public function mailSuppr($pseudo, $mail)
    {
        $token = uniqid();
        Envoyeur::sendEmail($pseudo, $mail, $token, "suppression");
        $this->insererUrl($token, $pseudo, "suppression");
    }

    public function insererUrl(string $token, $pseudo, string $fonction, $groupe = null)
    {
        $this->insererUrlBase($token, $pseudo, $fonction, $groupe);
    }


    public function userParMail($mail)
    {
        return $this->getUserParMail($mail);
    }
}