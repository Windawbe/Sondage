<?php
require_once("./index.php");

require_once ("./Classe/sondage.php");
require_once ("./Classe/question.php");
require_once ("./Classe/reponse.php");

if(!isset($_SESSION['pseudo'])){ // Si utilisateur non connecté
    require_once("./erreur.php");
}
else {
    ?>
    <br/><br/><br/><br/><br/>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-4 button">
                <a class="btn btn-lg btn-primary" href="./sondage.php">
                    <i class="fa fa-plus" aria-hidden="true"></i><span>Créer un sondage<br/><small></small></span></a>
            </div>
        </div>
    </div>
    <?php

    $id_utilisateur = $utilisateur->getIDByPseudo();

    $sondage = new sondage();
    $result = $sondage->GetSondageByUserID($id_utilisateur);

    echo "<div class='container' id='containerTest'>";
    foreach ($result AS $sondage) {
//        echo $sondage['id_sondage'] . " : " . $sondage['titre'];
        echo "<div class='row'><div class='col-md-4 col-sm-4 col-xs-4'>" .
            "<div class='well'><a id='".$sondage['id_sondage']."' class='supprimer' href='javascript:void(0);' role='button'><i class='fa fa-trash-o' aria-hidden='true'></i></a>" .
            "<h4 class='muted'>".$sondage['titre']."</h4>" .
            "<div class='row'>".
            "<hr><div class='col-md-6 col-sm-6 col-xs-6'>0 Réponses</div>" .
            "<div class='col-md-2 col-sm-2 col-xs-2'><a href='./modifierSondage.php?id=".$sondage['id_sondage']."' class='modifier'><i class='fa fa-pencil' aria-hidden='true' data-toggle='tooltip' title='Modifier'></i><hr></div></a>" .
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
    function ajaxProcess(url) {
        var xhttp;
        xhttp=new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200 ) {
//                document.getElementById(name).innerHTML=this.responseText;
            }
        };

        xhttp.open("GET", url, true);
        xhttp.send();
    }

    $(document.body).on('click','a.supprimer', function(){
        var id = $(this).attr("id");

        var survey = $(this).parent().parent();
        survey.remove();

        ajaxProcess("sondage_procedure.php?id="+id);
        return false;

    });

</script>