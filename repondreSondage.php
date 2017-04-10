<?php

require_once("./index.php");

if(!isset($_SESSION['pseudo'])){ // Si utilisateur non connecté
    require_once("./erreur.php");
}
else {
    require_once("./Classe/sondage.php");
    require_once("./Classe/question.php");
    require_once("./Classe/reponse.php");

    if(isset($_GET['id'])) {
        $sondage = Sondage::GetSondageByID($_GET['id']);
        foreach($sondage AS $res => $rest) {

            $datedeb = date("d/m/Y", strtotime($rest['dateDebut']));
            $datefin = date("d/m/Y", strtotime($rest['dateFin']));
            $verifduplication = $rest['verif_duplication'] == 0 ? '' : 'checked';
            $preventionspam = $rest['prevention_spam'] == 0 ? '' : 'checked';
            $anonyme = $rest['anonyme'] == 0 ? '' : 'checked';
            $chronometrer = $rest['chronometrer'] == 0 ? '' : 'checked';


        echo "<div class='wrapper container' style='margin-bottom:10px; margin-top:50px;'>".
            "<div class='col-xs-12 col-md-12 col-sm-12 col-lg-12'>".
            "<div class='login-area'>".
            "<div class='bg-image'>".
            "<div class='login-signup'>".
            "<div class='container'>".
            "<div class='login-header'>".
            "<div class='row'>".
            "<div class='col-md-6 col-sm-6 col-xs-6'>".
            "<div class='login-logo' style='margin-top:10px; margin-left:10px;'>".
            "<i class='fa fa-3x fa-file-text' aria-hidden='true' style='color:white;'></i>".
            "</div>".
            "</div>".
            "<div class='col-md-6 col-sm-6 col-xs-6'>".
            "<div class='login-details'>".
            "<ul class='nav nav-tabs navbar-right'>".
            "<li class='active'><a data-toggle='tab'>Répondre au sondage</a></li>".
            "</ul>".
            "</div>".
            "</div>".
            "</div>".
            "</div>".
            "<div class='tab-content'>".
            "<div id='login' class='tab-pane fade in active'>".
            "<div class='login-inner'>".
            "<div class='title' style='text-align:center;'>".
            "<div class='sondage'>".
            "<form method='post' action='./procedureEnvoiSondage.php?id=".$_GET['id']."' onsubmit='sendDate()'>".
            "<div class='form-details' id='sondage'>".
            "<label class='titre'>".
            "<h1>".$rest['titre']."</h1></label>".
            "</div>".
            "<label class='description'>".
            "<p align='justify' >".$rest['description']."</p></label>";
        }

        $question = Question::GetQuestion($_GET['id']);

        $i = 0;

        foreach($question AS $res => $rest) {
            $r = 0;
            $i++;
            echo "<div class='row question ".$rest['type']."' style='border:1px; border-color:#8492af; border-style:solid; border-radius:2px; margin-right:20px; margin-left:20px;' id='q".$i."'>".
                "<div class='well'><p>".$i. ") ".$rest['description']."</p></div>";

            $reponse = Reponse::GetAnswer($rest['id_question']);

            foreach($reponse AS $rep => $rept){
                $r++;
                if($rest['type'] == 'textuelle'){
                    echo "<div class='row reponse' id='r" . $r . "'>" .
                        "<div class='col-md-10 col-sm-10 col-xs-10 col-md-offset-1'>" .
                        "<input type='text' class='form-control' name='q".$rest['id_question']."[]' id='q" . $i . "r" . $r . "' value='".$rept['reponse']."'>".
                        "</div>" .
                        "</div><br/>";
                }
                else{
                    echo "<div class='row reponse' id='r" . $r . "'>" .
                        "<div class='col-md-10 col-sm-10 col-xs-10 col-md-offset-1'>" .
                        "<div class='input-group'>".
                        "<span class='input-group-addon'>".
                        "<input type='".$rest['type']."' name='q".$rest['id_question']."[]' value='".$rept['id_reponse']."' style='position:relative; margin:0; cursor:pointer;'>".
                        "</span>".
                        "<input type='text' class='form-control' readonly disabled name='reponse[" . $i . "][r" . $r . "]' id='q" . $i . "r" . $r . "' value='".$rept['reponse']."'>".
                        "</div>".
                        "</div>" .
                        "</div><br/>";
                }
            }

            echo "</div>";
        }

       echo
            "<button type='submit' class='form-btn' id='sendForm'>Envoyer</button>".
            "</div>".
            "</form>".
            "</div></div></div></div></div></div></div></div></div></div>";
    }
    else{
        require_once("./erreur.php");
    }

    ?>

    <?php
}
?>

<script type="text/javascript" src="./createSondage.js" ></script>


<style>
    input.form-control:read-only {
        background-color: white;
    }
</style>