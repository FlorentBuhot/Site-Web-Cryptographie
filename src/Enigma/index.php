<?php
session_start();

require_once('./config/config.php');

require_once('./config/Autoloader.php');
Autoloader::charger();


require_once('./controllers/Routeur.php');

$routeur = new Routeur();
try {
    $routeur->routeReq();
} catch (Exception $e) {
}