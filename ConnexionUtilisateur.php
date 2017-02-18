<?php 
require_once("index.php");

try{
    $db = new PDO('mysql:host=localhost;dbname=sondage', 'root', '');
    $db->exec("SET CHARACTER SET utf8"); 
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
}
catch (Exception $e){
    die('Erreur : ' . $e->getMessage());
}

$login=$_POST['username'];
// Hachage du mot de passe
$password=$_REQUEST['password'];
$pass_hache = sha1('gz' .$password);

// Vérification des identifiants
if(!empty($pass_hache)){
    $resultat = $db->query("SELECT pseudo FROM utilisateur WHERE pseudo = '".$login."' AND mdp = '".$pass_hache."'")->fetch();
}

if (!$resultat){
    echo 'Mauvais identifiant ou mot de passe !';
}
else{
    $_SESSION['pseudo'] = $login;
    echo 'Vous êtes connecté !';
}

// connexion automatique
if (isset($_SESSION['pseudo'])){
    echo 'Bonjour ' . $_SESSION['pseudo'];
}

header("Refresh: 0; URL=./index.php");

?>