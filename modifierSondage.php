<?php
require_once("./index.php");

if(!isset($_SESSION['pseudo'])){ // Si utilisateur non connecté
    require_once("./erreur.php");
}
else {
    require_once("./Classe/sondage.php");
    require_once("./Classe/question.php");
    require_once("./Classe/reponse.php");

    // VERIFIE QU'UN UTILISATEUR NE PEUT PAS ALLER MODIFIER LE SONDAGE D'UN AUTRE UTILISATEUR
    $id_utilisateur = Utilisateur::getIDByPseudo();
    $verif_sondage = Sondage::GetSondageByUserID($id_utilisateur);

    $test_verif = NULL;

    foreach($verif_sondage as $ID => $idd){
        if($_GET['id'] == $idd['id_sondage']){
            $test_verif = 1;
        }
    }

    if(isset($_GET['id']) && isset($test_verif)) {

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
                                                    "<li class='active'><a data-toggle='tab'>Modifier vos sondages</a></li>".
                                                "</ul>".
                                            "</div>".
                                        "</div>".
                                    "</div>".
                                "</div>".
                                "<div class='tab-content'>".
                                    "<div id='login' class='tab-pane fade in active'>".
                                        "<div class='login-inner'>".
                                            "<div class='title' style='text-align:center;'>".
                                                "<h2>Modification du sondage</h2>".
                                            "</div>".
                                            "<div class='login-form'>".
                                                "<form method='post' action='./modificationSondage.php?id=".$_GET['id']."' onsubmit='sendDate()'>".
                                                    "<div class='form-details' id='sondage'>".
                                                        "<label class='titre'>";

        $sondage = Sondage::GetSondageByID($_GET['id']);

        foreach($sondage AS $res => $rest) {
            $datedeb = date("d/m/Y", strtotime($rest['dateDebut']));
            $datefin = date("d/m/Y", strtotime($rest['dateFin']));
            $verifduplication = $rest['verif_duplication'] == 0 ? '' : 'checked';
            $preventionspam = $rest['prevention_spam'] == 0 ? '' : 'checked';
            $anonyme = $rest['anonyme'] == 0 ? '' : 'checked';
            $chronometrer = $rest['chronometrer'] == 0 ? '' : 'checked';

            echo "<input type='text' name='titre' placeholder='Titre du sondage' id='titre' value="."\"".$rest['titre']."\""." required>".
                "</label>".
                "<label class='intro'>".
                    "<input type='text' name='introduction' placeholder=\"Texte d'introduction\" id='titre' value="."\"".$rest['description']."\""." required>".
                "</label>".
                "<br /><br /><br />".
                "<div class='row' id='AllQuestions' style='margin-left:30px; text-align:left; color:#a9abae; font-size:16px; font-weight: 300;'>Questions</div>";

        }

        $question = Question::GetQuestion($_GET['id']);

        $i = 0;

        foreach($question AS $res => $rest) {
            $r = 0;
            $i++;
            echo "<div class='row question ".$rest['type']."' style='border:1px; border-color:#8492af; border-style:solid; border-radius:2px; margin-right:20px; margin-left:20px;' id='q".$i."'>".
                "<div class='col-md-1'><i class='fa fa-times' aria-hidden='true'></i></div>".
                "<label>".
                    "<input type='text' name='type[".$i."]' class='type' value='".$rest['type']."' hidden />".
                "</label>".
                "<div class='introduct'><span id='numQ'>".$i."</span><input type='text' name='question[".$i."][intro]' id='intro".$i."' placeholder='Écrivez le texte de votre question...' value="."\"".$rest['description']."\""." required></div>";

            $reponse = Reponse::GetAnswer($rest['id_question']);

            foreach($reponse AS $rep => $rept){
                $r++;
                if($rest['type'] == 'textuelle'){
                    echo "<div class='row reponse' id='r" . $r . "'>" .
                        "<div class='col-md-12 col-sm-12 col-xs-12'></div>" .
                        "<div class='col-md-6 col-sm-6 col-xs-6 col-md-push-3'>" .
                        "<input type='text' class='reponse' name='reponse[" . $i . "][r" . $r . "]' id='q" . $i . "r" . $r . "' placeholder='Réponse " . $r . "' value=" . "\"" . $rept['reponse'] . "\"" . " required />" .
                        "</div>".
                        "<div class='col-md-1 col-sm-1 col-xs-1 col-md-push-3'>" .
                        "<i class='fa fa-trash fa-1x deleterep' aria-hidden='true'></i>" .
                        "</div></div>";
                }
                else{
                    echo "<div class='row reponse' id='r" . $r . "'>" .
                        "<div class='col-md-2 col-sm-2 col-xs-2 col-md-offset-1'>" .
                        "<input type='" . $rest['type'] . "' disabled style='cursor:default; text-align:left;' />" .
                        "</div>" .
                        "<div class='col-md-6 col-sm-6 col-xs-6'>" .
                        "<input type='text' class='reponse' name='reponse[" . $i . "][r" . $r . "]' id='q" . $i . "r" . $r . "' placeholder='Réponse " . $r . "' value=" . "\"" . $rept['reponse'] . "\"" . " required />" .
                        "</div>" .
                        "<div class='col-md-1 col-sm-1 col-xs-1'>" .
                        "<i class='fa fa-trash fa-1x deleterep' aria-hidden='true'></i>" .
                        "</div>" .
                        "</div>";
                }
            }

            echo "<div class='row reponse' id='r".($r+1)."'></div>".
                "<div class='row'>".
                    "<i class='fa fa-plus-circle fa-1x addNewReponse' aria-hidden='true' style='position:relative;'>Ajouter réponse</i>".
                        "<br />".
                "</div></div>";
        }

        echo "<div class='newchoice'></div>".
            "<div class='addQuestion' style='color:#b0c900;'>".
                "<i class='fa fa-plus-circle addQ' aria-hidden='true' style='font-size:50px; font-weight: 300;'></i>".
            "</div>".
            "<div class='row' style='margin-left:30px; text-align:left; color:#a9abae; font-size:16px; font-weight: 300;'>".
                "<span>Paramétrage</span>".
            "</div><br />".
            "<div class='row'>".
                "<div class='col-md-4 col-sm-4 col-xs-4' style='font-size:15px;'>".
                "<span>Validité du questionnaire</span>".
            "</div>".
            "<div class='col-md-4 col-sm-4 col-xs-4' >".
                "<span>".
                    "<label style='font-size:15px; text-decoration: none;'>".
                        "Du <input type='text' id='datedebut' name='datedebut' value='".$datedeb."' class='datepicker' style='width:50%; padding:0; font-size:14px; margin-left:0px; text-align:center;' readonly required>".
                    "</label>".
                "</span>".
            "</div>".
            "<div class='col-md-4 col-sm-4 col-xs-4' >".
                "<span>".
                    "<label style='font-size:15px; text-decoration: none;'>".
                        "Au <input type='text' id='datefin' name='datefin' class='datepicker' value='".$datefin."' style='width:50%; padding:0; font-size:14px; margin-left:0px; text-align:center;' readonly required>".
                    "</label>".
                "</span>".
            "</div>".
            "</div>".
            "<div class='funkyradio'>".
                "<div class='funkyradio-default' style='margin:20px;'>".
                    "<input type='checkbox' name='prevSpam' id='checkbox1' ".$preventionspam. "/>".
                    "<label for='checkbox1'>Prévention contre le spam</label>".
                "</div>".
            "</div>".
            "<div class='funkyradio'>".
                "<div class='funkyradio-default' style='margin:20px;'>".
                    "<input type='checkbox' name='verifDuplication' id='checkbox2' ".$verifduplication. "/>".
                    "<label for='checkbox2'>Vérification duplication</label>".
                "</div>".
            "</div>".
            "<div class='funkyradio'>".
                "<div class='funkyradio-default' style='margin:20px;'>".
                    "<input type='checkbox' name='anonyme' id='checkbox3' ".$anonyme. "/>".
                    "<label for='checkbox3'>Anonyme</label>".
                "</div>".
            "</div>".
            "<div class='funkyradio'>".
                "<div class='funkyradio-default' style='margin:20px;'>".
                    "<input type='checkbox' name='chronometrer' id='checkbox4' ".$chronometrer. "/>".
                    "<label for='checkbox4'>Chronométrer</label>".
                "</div>".
            "</div>".
            "<button type='submit' class='form-btn' id='sendForm'>Modifier</button>".
        "</div>".
        "<label>".
            "<input type='text' name='nQuestion' id='nQuestion' hidden />".
        "</label>".
        "<label>".
            "<input type='text' name='date' id='date' hidden />".
        "</label>".
        "<label>".
            "<input type='text' name='date2' id='date2' hidden />".
        "</label>".
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
    .question{
        margin-bottom:15px;
    }
    .deleterep{
        margin: 20px 50px 0;
        margin-top: 1px\9;
        line-height: normal;
    }

    input[type=checkbox], input[type=radio] {
        margin: 20px 50px 0;
        margin-top: 1px\9;
        line-height: normal;
    }
    .btnradio{
        padding-top:10px;
    }

    .reponse{
        padding-top: 10px;
        padding-right: 0px;
        padding-bottom: 0px;
        padding-left: 0px;
    }

    .fa-trash{
        cursor:pointer;
        margin-left:15px;
    }

    .fa-trash:hover{
        color:red;
    }

    .fa-plus-circle{
        color:#b0c900;
    }
    .fa-plus-circle:hover{
        cursor:pointer;
        opacity: .5;
    }

    .brightness{
        border-radius:3px;
        color:#8492af;
        width: 100px;
        height:100px;
        border:1px;
        border-style:solid;
        margin-top:20px;
        margin-bottom:20px;
    }
    .brightness:hover{
        opacity: .5;
        cursor:pointer;
    }

    #comment{
        max-width: 550px;
    }

    .fa-times{
        color:red;
    }
    .fa-times:hover{
        opacity: .5;
        cursor:pointer;
    }

    .funkyradio div {
        clear: both;
        overflow: hidden;
    }

    .funkyradio label {
        width: 100%;
        border-radius: 3px;
        border: 1px solid #D1D3D4;
        font-weight: normal;
    }

    .funkyradio input[type="radio"]:empty,
    .funkyradio input[type="checkbox"]:empty {
        display: none;
    }

    .funkyradio input[type="radio"]:empty ~ label,
    .funkyradio input[type="checkbox"]:empty ~ label {
        position: relative;
        line-height: 2.5em;
        text-indent: 3.25em;
        /*margin-top: 2em;*/
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .funkyradio input[type="radio"]:empty ~ label:before,
    .funkyradio input[type="checkbox"]:empty ~ label:before {
        position: absolute;
        display: block;
        top: 0;
        bottom: 0;
        left: 0;
        content: '';
        width: 2.5em;
        background: #D1D3D4;
        border-radius: 3px 0 0 3px;
    }

    .funkyradio input[type="radio"]:hover:not(:checked) ~ label,
    .funkyradio input[type="checkbox"]:hover:not(:checked) ~ label {
        color: #888;
    }

    .funkyradio input[type="radio"]:hover:not(:checked) ~ label:before,
    .funkyradio input[type="checkbox"]:hover:not(:checked) ~ label:before {
        content: '\2714';
        text-indent: .9em;
        color: #C2C2C2;
    }

    .funkyradio input[type="radio"]:checked ~ label,
    .funkyradio input[type="checkbox"]:checked ~ label {
        color: #777;
    }

    .funkyradio input[type="radio"]:checked ~ label:before,
    .funkyradio input[type="checkbox"]:checked ~ label:before {
        content: '\2714';
        text-indent: .9em;
        color: #333;
        background-color: #ccc;
    }

    .funkyradio input[type="radio"]:focus ~ label:before,
    .funkyradio input[type="checkbox"]:focus ~ label:before {
        box-shadow: 0 0 0 3px #999;
    }

    .funkyradio-default input[type="radio"]:checked ~ label:before,
    .funkyradio-default input[type="checkbox"]:checked ~ label:before {
        color: #333;
        background-color: #ccc;
    }

    .funkyradio-primary input[type="radio"]:checked ~ label:before,
    .funkyradio-primary input[type="checkbox"]:checked ~ label:before {
        color: #fff;
        background-color: #337ab7;
    }

    .funkyradio-success input[type="radio"]:checked ~ label:before,
    .funkyradio-success input[type="checkbox"]:checked ~ label:before {
        color: #fff;
        background-color: #5cb85c;
    }

    .funkyradio-danger input[type="radio"]:checked ~ label:before,
    .funkyradio-danger input[type="checkbox"]:checked ~ label:before {
        color: #fff;
        background-color: #d9534f;
    }

    .funkyradio-warning input[type="radio"]:checked ~ label:before,
    .funkyradio-warning input[type="checkbox"]:checked ~ label:before {
        color: #fff;
        background-color: #f0ad4e;
    }

    .funkyradio-info input[type="radio"]:checked ~ label:before,
    .funkyradio-info input[type="checkbox"]:checked ~ label:before {
        color: #fff;
        background-color: #5bc0de;
    }
</style>


