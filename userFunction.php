<?php
require_once("./index.php");

if(!isset($_SESSION['pseudo'])){ // Si utilisateur non connecté
    require_once("./erreur.php");
}
else {
    require_once("./Classe/utilisateur.php");
    ?>

    <br/><br/><br/><br/><br/>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-4 button">
                <a class="btn btn-lg btn-primary" href="./CreationSondage.php">
                    <i class="fa fa-plus" aria-hidden="true"></i><span>Créer un sondage<br/><small></small></span></a>
            </div>
        </div>
    </div>
    <?php

    // <editor-fold desc="Connexion BDD">
    try {
        $db = new PDO('mysql:host=localhost;dbname=sondage', 'root', '');
        $db->exec("SET CHARACTER SET utf8");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    // </editor-fold>

    $query = $db->prepare('SELECT id_utilisateur FROM utilisateur WHERE pseudo =:pseudo');
    $query->bindValue(':pseudo', $_SESSION['pseudo'], PDO::PARAM_STR);
    $query->execute();
    $id_utilisateur = $query->fetchColumn();

    $query = $db->prepare('SELECT * FROM sondage WHERE id_utilisateur =:pseudo');
    $query->bindValue(':pseudo', $id_utilisateur, PDO::PARAM_INT);
    $query->execute();
    $result = $query->fetchAll();
echo "<div class='container'>";
    foreach ($result AS $sondage) {
//        echo $sondage['id_sondage'] . " : " . $sondage['titre'];
        echo "<div class='row'><div class='col-md-4 col-sm-4 col-xs-4'>" .
            "<div class='well'><a id='".$sondage['id_sondage']."' class='supprimer' href='javascript:void(0);' role='button'><i class='fa fa-trash-o' aria-hidden='true'></i></a>" .
            "<h4 class='muted'>".$sondage['titre']."</h4>" .
            "<div class='row'>".
                "<hr><div class='col-md-6 col-sm-6 col-xs-6'>0 Réponses</div>" .
                "<div class='col-md-2 col-sm-2 col-xs-2'><a href><i class='fa fa-pencil' aria-hidden='true' data-toggle='tooltip' title='Modifier'></i><hr></div></a>" .
                "<div class='col-md-2 col-sm-2 col-xs-2'><a href='./partager.php?id=".$sondage['id_sondage']."'><i class='fa fa-share' aria-hidden='true' data-toggle='tooltip' title='Partager'></i><hr></div></a>" .
                "<div class='col-md-2 col-sm-2 col-xs-2'><a href><i class='fa fa-pie-chart' aria-hidden='true' data-toggle='tooltip' title='Analyser'></i><hr></div></a>" .
            "</div></div></div>";
    }
    echo "</div>";
}

?>



<style>
    .button{
        padding-bottom:15px;
    }
    .fa{
        margin-right:5px;
    }
    .ds-btn li{
        list-style:none;
        float:left;
        padding:10px;
    }
    .ds-btn li a span{
        padding-left:15px;
        padding-right:5px;
        width:100%;
        display:inline-block;
        text-align:left;
    }
    .ds-btn li a span small{
        width:100%;
        display:inline-block;
        text-align:left;
    }
</style>

<script>
$(document.body).on('click','a.supprimer', function(){

var id = $(this).attr("id");
alert("supprimer : " + id);
$.ajax({
type:"GET",
url: "userFunction.php?delete="+id
});

return false;

});
</script>