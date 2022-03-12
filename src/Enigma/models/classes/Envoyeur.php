<?php

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

class Envoyeur
{
    public static function sendEmail($pseudo, $adresseDest, $url, $motif)
    {
        //echo "Envoyer par mail l'url ",$url;

        $email = new PHPMailer(TRUE);
        try {
            /* Set the mail sender. */
            $email->setFrom('enigma.iut.uca@gmail.com');

            /* Add a recipient. */
            $email->addAddress($adresseDest);

            /* Set the subject. */
            switch ($motif) {
                case "inscription":
                    $email->Subject = "Activation de votre compte Mission Crypto";
                    $email->Body = "Bonjour " . $pseudo . ",\nPour confirmer l'activation de votre compte, veuillez cliquer sur le lien ci-dessous. \n https://sancy.iut-clermont.uca.fr/~lafourcade/site-web-cryptographie/src/Enigma/index.php?url=" . $url . "\n Ce lien n'est valable que 10 minutes !";
                    break;
                case "suppression":
                    $email->Subject = "Suppression d'un compte Mission Crypto";
                    $email->Body = "Bonjour " . $pseudo . ",\nPour confirmer la suppression de votre compte, veuillez cliquer sur le lien ci-dessous. \n https://sancy.iut-clermont.uca.fr/~lafourcade/site-web-cryptographie/src/Enigma/index.php?url=" . $url . "\n Ce lien n'est valable que 10 minutes !";
                    break;
                case "modifMdp":
                    $email->Subject = 'Confirmation de modification de mot de passe d\'un compte Mission Crypto';
                    $email->Body = "Bonjour " . $pseudo . ",\nPour confirmer votre changement de mot de passe, veuillez cliquer sur le lien ci-dessous. \n https://sancy.iut-clermont.uca.fr/~lafourcade/site-web-cryptographie/src/Enigma/index.php?url=" . $url . "\n Ce lien n'est valable que 10 minutes !";
                    break;
                case "reinitMdp":
                    $email->Subject = 'Confirmation de reinitialisation de mot de passe d\'un compte Mission Crypto';
                    $email->Body = "Bonjour " . $pseudo . ",\nPour confirmer votre reinitialisation de mot de passe, veuillez cliquer sur le lien ci-dessous. \n https://sancy.iut-clermont.uca.fr/~lafourcade/site-web-cryptographie/src/Enigma/index.php?url=" . $url . "\n Ce lien n'est valable que 10 minutes !";
                    break;
                case "reinitMdpGrp":
                    $email->Subject = 'Confirmation de reinitialisation de mot de passe d\'un groupe d\'Mission Crypto';
                    $email->Body = "Bonjour " . $pseudo . ",\nPour confirmer votre reinitialisation de mot de passe, veuillez cliquer sur le lien ci-dessous. \n https://sancy.iut-clermont.uca.fr/~lafourcade/site-web-cryptographie/src/Enigma/index.php?url=" . $url . "\n Ce lien n'est valable que 10 minutes !";
                    break;
            }


            /* Tells PHPMailer to use SMTP. */
            $email->isSMTP();

            /* SMTP server address. */
            $email->Host = 'smtp.gmail.com';

            /* Use SMTP authentication. */
            $email->SMTPAuth = TRUE;

            /* Set the encryption system. */
            //$email->SMTPSecure = 'ssl';
            $email->SMTPSecure = 'tls';

            /* SMTP authentication username. */
            $email->Username = 'enigma.iut.uca@gmail.com';

            /* SMTP authentication password. */
            $email->Password = 'Enigma2022';

            /* Set the SMTP port. */
            $email->Port = 587;

            /* Finally send the mail. */
            $email->send();
        } catch (Exception $e) {
            /* PHPMailer exception. */
            echo $e->errorMessage();
        } catch (\Exception $e) {
            /* PHP exception (note the backslash to select the global namespace Exception class). */
            echo $e->getMessage();
        }
    }
}