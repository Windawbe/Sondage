<?php

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

$query = $db->prepare('DELETE FROM sondage WHERE id_sondage =:id_sondage');
$query->bindValue(':id_sondage', $_GET['id'], PDO::PARAM_INT);
$query->execute();

?>
