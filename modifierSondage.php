<?php
require_once("./index.php");

if(!isset($_SESSION['pseudo'])){ // Si utilisateur non connecté
    require_once("./erreur.php");
}
else {
    // <editor-fold desc="Connexion BDD">
    try{
        $db = new PDO('mysql:host=localhost;dbname=sondage', 'root', '');
        $db->exec("SET CHARACTER SET utf8");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (Exception $e){
        die('Erreur : ' . $e->getMessage());
    }
    // </editor-fold>

    $query = $db->prepare('SELECT id_utilisateur FROM utilisateur WHERE pseudo =:pseudo');
    $query->bindValue(':pseudo', $_SESSION['pseudo'], PDO::PARAM_STR);
    $query->execute();
    $id_utilisateur = $query->fetchColumn();

?>



<?php
}
?>