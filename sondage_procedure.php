<?php
require_once("./index.php");
require_once("./Classe/sondage.php");

if(isset($_GET['id'])) {
    Sondage::DeleteSondage($_GET['id']);
}


?>
