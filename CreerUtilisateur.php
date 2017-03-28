<?php
require_once("index.php");

if(isset($_SESSION['pseudo'])){ // Si utilisateur déjà connecté, envoie message erreur s'il essaye de se connecter à la page d'inscription
    require_once("erreur.php");
}
else{
    if(isset($_REQUEST['username']) && isset($_REQUEST['name']) && isset($_REQUEST['firstname']) && isset($_REQUEST['email']) && isset($_REQUEST['address'])
        && isset($_REQUEST['password']) && isset($_REQUEST['confirm'])) {

        $utilisateur::add($_REQUEST['username'], $_REQUEST['name'], $_REQUEST['firstname'], $_REQUEST['email'], $_REQUEST['address'], $_REQUEST['password'], $_REQUEST['confirm']);
    }
}
?>