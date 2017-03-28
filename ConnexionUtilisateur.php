<?php
require_once("index.php");

if(isset($_REQUEST['username']) && isset($_REQUEST['password'])) {

    $utilisateur::connexion($_REQUEST['username'], $_REQUEST['password']);
}
?>