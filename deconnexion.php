<?php
require_once("index.php");
// Suppression des variables de session et de la session
$_SESSION = array();
session_destroy();

// Suppression des cookies de connexion automatique
setcookie('pseudo', '');
setcookie('pass_hache', '');
header("Refresh: 0; URL=./index.php");
?>

