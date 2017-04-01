<?php

require_once("./index.php");

if(!isset($_SESSION['pseudo'])){ // Si utilisateur non connecté
    require_once("./erreur.php");
}
else{
    echo "<br/><br/><br/><br/><br/>".
    "<div class='container' id='containerTest'>".
        "<div class='row'>".
            "<div class='col-md-12 col-sm-12 col-xs-12'>".
                "<div class='well'>".
                    "<a href>Sondage2/repondreSondage.php?id=".$_GET['id']."</a>".
                "</div>".
            "</div>".
        "</div>".
    "</div>";
?>


<?php
}
?>