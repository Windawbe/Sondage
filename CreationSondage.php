
<?php
require_once("./index.php");
?>

<?php
if(!isset($_SESSION['pseudo'])){ // Si utilisateur non connecté
    require_once("./erreur.php");
}
else{
    ?>
    <div class="wrapper container" style="margin-bottom:10px; margin-top:50px;">
        <div class="col-xs-12 col-md-12 col-sm-12 col-lg-12">
            <div class="login-area">
                <div class="bg-image">
                    <div class="login-signup">
                        <div class="container">
                            <div class="login-header">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <div class="login-logo" style="margin-top:10px; margin-left:10px;">
                                            <i class="fa fa-3x fa-file-text" aria-hidden="true" style="color:white;"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <div class="login-details">
                                            <ul class="nav nav-tabs navbar-right">
                                                <li class="active"><a data-toggle="tab">Gérer vos sondages</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-content">
                                <div id="login" class="tab-pane fade in active">
                                    <div class="login-inner">
                                        <div class="title" style="text-align:center;">
                                            <h2>Création du sondage</h2>
                                        </div>
                                        <div class="login-form">
                                            <form method="post" action="./parametrage.php" onsubmit="sendDate()">
                                                <div class="form-details" id="sondage"> <!-- REGARDER ICI le nb question -->
                                                    <label class="titre">
                                                        <input type="text" name="titre" placeholder="Titre du sondage" id="titre" required>
                                                    </label>
                                                    <label class="intro">
                                                        <input type="text" name="introduction" placeholder="Texte d'introduction" id="titre" required>
                                                    </label>
                                                    <br /><br /><br />
                                                    <div class="row" id="AllQuestions" style="margin-left:30px; text-align:left; color:#a9abae; font-size:16px; font-weight: 300;">Questions</div>
                                                    <!-- QUESTION 1-->
                                                    <div class='row question radio' style="border:1px; border-color:#8492af; border-style:solid; border-radius:2px; margin-right:20px; margin-left:20px;" id="q1">
                                                        <div class="col-md-1"><i class="fa fa-times" aria-hidden="true"></i></div>
                                                        <label>
                                                            <input type="text" name="type[1]" class="type" value="radio" hidden />
                                                        </label>
                                                        <div class='introduct'><span id='numQ'>1</span><input type="text" name="question[1][intro]" id="intro1" placeholder="Écrivez le texte de votre question..." required></div>
                                                        <!-- Reponse 1-->
                                                        <div class="row reponse" id='r1'>
                                                            <div class="col-md-2 col-sm-2 col-xs-2 col-md-offset-1">
                                                                <input type="radio" class="btnradio" disabled style="cursor:default; text-align:left;" />
                                                            </div>
                                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                                <input type="text" class="reponse" name='reponse[1][r1]' id="q1r1" placeholder="Réponse 1" required />
                                                            </div>
                                                            <div class="col-md-1 col-sm-1 col-xs-1">
                                                                <i class="fa fa-trash fa-1x deleterep" aria-hidden="true"></i>
                                                            </div>
                                                        </div>
                                                        <!-- Reponse 2-->
                                                        <div class="row reponse" id='r2'>
                                                            <div class="col-md-2 col-sm-2 col-xs-2 col-md-offset-1">
                                                                <input type="radio" class="btnradio" name="btnradio" disabled style="cursor:default; text-align:left;" />
                                                            </div>
                                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                                <input type="text" class="reponse" name='reponse[1][r2]' id="q1r2" placeholder="Réponse 2" required />
                                                            </div>
                                                            <div class="col-md-1 col-sm-1 col-xs-1">
                                                                <i class="fa fa-trash fa-1x deleterep" aria-hidden="true"></i>
                                                            </div>
                                                        </div>
                                                        <div class="row reponse" id="r3">

                                                        </div>
                                                        <div class='row'>
                                                            <i class="fa fa-plus-circle fa-1x addNewReponse" aria-hidden="true" style="position:relative;">Ajouter réponse</i>
                                                            <br />
                                                        </div>
                                                    </div>
<!--                                                    <div class="test"></div>-->
                                                    <div class="newchoice"></div>
                                                    <!-- Ajout d'une nouvelle question -->
                                                    <div class="addQuestion" style="color:#b0c900;">
                                                        <i class="fa fa-plus-circle addQ" aria-hidden="true" style="font-size:50px; font-weight: 300;"></i>
                                                    </div>
<!--                                                    <br /><br />-->

                                                    <div class="row" style="margin-left:30px; text-align:left; color:#a9abae; font-size:16px; font-weight: 300;">
                                                        <span>Paramétrage</span>
                                                    </div>
                                                    <br />
                                                    <div class="row">
                                                        <div class="col-md-4 col-sm-4 col-xs-4" style="font-size:15px;">
                                                            <span>Validité du questionnaire</span>
                                                        </div>
                                                        <div class="col-md-4 col-sm-4 col-xs-4" >
                                                            <span>
                                                                <label style="font-size:15px; text-decoration: none;">
                                                                    Du <input type="text" id="datedebut" name="datedebut" class="datepicker" style="width:50%; padding:0; font-size:14px; margin-left:0px; text-align:center;" readonly required>
                                                                </label>
                                                            </span>
                                                        </div>
                                                        <div class="col-md-4 col-sm-4 col-xs-4" >
                                                            <span>
                                                                <label style="font-size:15px; text-decoration: none;">
                                                                    Au <input type="text" id="datefin" name="datefin" class="datepicker" style="width:50%; padding:0; font-size:14px; margin-left:0px; text-align:center;" readonly required>
                                                                </label>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="funkyradio">
                                                        <div class="funkyradio-default" style="margin:20px;">
                                                            <input type="checkbox" name="prevSpam" id="checkbox1" />
                                                            <label for="checkbox1">Prévention contre le spam</label>
                                                        </div>
                                                    </div>
                                                    <div class="funkyradio">
                                                        <div class="funkyradio-default" style="margin:20px;">
                                                            <input type="checkbox" name="verifDuplication" id="checkbox2" />
                                                            <label for="checkbox2">Vérification duplication</label>
                                                        </div>
                                                    </div>
                                                    <div class="funkyradio">
                                                        <div class="funkyradio-default" style="margin:20px;">
                                                            <input type="checkbox" name="anonyme" id="checkbox3" />
                                                            <label for="checkbox3">Anonyme</label>
                                                        </div>
                                                    </div>
                                                    <div class="funkyradio">
                                                        <div class="funkyradio-default" style="margin:20px;">
                                                            <input type="checkbox" name="chronometrer" id="checkbox4" />
                                                            <label for="checkbox4">Chronométrer</label>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="form-btn" id='sendForm'>Créer</button>
                                                </div>
                                                <label>
                                                    <input type="text" name="nQuestion" id="nQuestion" hidden />
                                                </label>
                                                <label>
                                                    <input type="text" name="date" id="date" hidden />
                                                </label>
                                                <label>
                                                    <input type="text" name="date2" id="date2" hidden />
                                                </label>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>

<script type="text/javascript">

    function sendDate(){
        $('#date').val($('#datedebut').val().replace(/\//g, ''));
        $('#date2').val($('#datefin').val().replace(/\//g, ''));

        //alert($('#date').val());
    }

    // <editor-fold desc="Datepicker">
    $( function() {
        $( "#datedebut" ).datepicker({
            onSelect:function(selected){
                $("#datefin").datepicker( "option", "minDate", selected );
            }
        });

        $( "#datefin" ).datepicker({
            onSelect:function(selected){
                $("#datedebut").datepicker( "option", "maxDate", selected );
            }
        });
    });

    $.datepicker.regional['fr'] = {clearText: 'Effacer', clearStatus: '',
        closeText: 'Fermer', closeStatus: 'Fermer sans modifier',
        prevText: '&lt;Préc', prevStatus: 'Voir le mois précédent',
        nextText: 'Suiv&gt;', nextStatus: 'Voir le mois suivant',
        currentText: 'Courant', currentStatus: 'Voir le mois courant',
        monthNames: ['Janvier','Février','Mars','Avril','Mai','Juin',
            'Juillet','Août','Septembre','Octobre','Novembre','Décembre'],
        monthNamesShort: ['Jan','Fév','Mar','Avr','Mai','Jun',
            'Jul','Aoû','Sep','Oct','Nov','Déc'],
        monthStatus: 'Voir un autre mois', yearStatus: 'Voir un autre année',
        weekHeader: 'Sm', weekStatus: '',
        dayNames: ['Dimanche','Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi'],
        dayNamesShort: ['Dim','Lun','Mar','Mer','Jeu','Ven','Sam'],
        dayNamesMin: ['Di','Lu','Ma','Me','Je','Ve','Sa'],
        dayStatus: 'Utiliser DD comme premier jour de la semaine', dateStatus: 'Choisir le DD, MM d',
        dateFormat: 'dd/mm/yy', firstDay: 0,
        initStatus: 'Choisir la date', isRTL: false};
    $.datepicker.setDefaults($.datepicker.regional['fr']);
    // </editor-fold>

    $(document).ready(function() {
        $("form").submit(function() {
            //alert($(".question").length);
        });

        $("#nQuestion").val($("#sondage .question").length);

        // Création de l'image envoyée
        $(document).on('change', '#file-input-uniqueimage', function (e) {
            loadImage(
                e.target.files[0],
                function (img) {
//                    $("#result").append("");
                    $("#result").append(img);
//                    $("#result").append("</div>");
                    $("#result").append("<div class='row reponse'><div class='col-md-2 col-sm-2 col-xs-2 col-md-offset-1'><input type='radio' class='btnradio' disabled style='cursor:default; text-align:left;' required /></div><div class='col-md-6 col-sm-6 col-xs-6'><input type='text' class='reponse' placeholder='Réponse' /></div><div class='col-md-1 col-sm-1 col-xs-1'><i class='fa fa-trash fa-1x deleterepimage' aria-hidden='true'></i></div></div>");
                },
                {maxWidth: 200} // Options
            );
        });

        // <editor-fold desc="Creer nouvelle question">
        $(".addQ").click(function(){
            $( ".newchoice" ).append("<div class='AllChoices'><img class='brightness choixunique' src='Images/a.jpg' /><img class='brightness' id='choixmultiple' src='Images/b.jpg' /><img class='brightness' id='reponsetextuelle' src='Images/c.jpg' /><img class='brightness' id='choixuniqueimage' src='Images/d.jpg' /><img class='brightness' id='choixmultipleimage' src='Images/e.jpg' /><img class='brightness' id='choixetoile' src='Images/f.jpg' /></div></div>");
        });
        // </editor-fold>

        // <editor-fold desc="Sélection choix unique">
        $(document).on("click",".choixunique",function(){
            var count = $("#sondage .question").length +1;
            //alert("#q"+(count-1));
            if((count-1) != 0)
            {
                $("#q" + (count - 1)).after("<div class='row question radio' id='q" + count + "' style='border:1px; border-color:#8492af; border-style:solid; border-radius:2px; margin-right:20px; margin-left:20px;'><div class='col-md-1'><i class='fa fa-times' aria-hidden='true'></i></div><label><input type='text' name='type["+count+"]' value='radio' class='type' hidden /></label><div class='introduct'><span id='numQ'>" + count + "</span><input type='text' name='question["+count+"][intro]' id='intro" + count + "' placeholder='Écrivez le texte de votre question...' required></div><div class='row reponse' id='r1'><div class='col-md-2 col-sm-2 col-xs-2 col-md-offset-1'><input type='radio' class='btnradio' disabled style='cursor:default; text-align:left;' required /></div><div class='col-md-6 col-sm-6 col-xs-6'><input type='text' class='reponse' name='reponse["+count+"][r1]' id='q" + count + "r1' placeholder='Réponse 1' /></div><div class='col-md-1 col-sm-1 col-xs-1'><i class='fa fa-trash fa-1x deleterep' aria-hidden='true'></i></div></div><div class='row reponse' id='r2'><div class='col-md-2 col-sm-2 col-xs-2 col-md-offset-1'><input type='radio' class='btnradio' disabled style='cursor:default; text-align:left;' /></div><div class='col-md-6 col-sm-6 col-xs-6'><input type='text' class='reponse' name='reponse["+count+"][r2]' id='q" + count + "r2' placeholder='Réponse 2' required /></div><div class='col-md-1 col-sm-1 col-xs-1'><i class='fa fa-trash fa-1x deleterep' aria-hidden='true'></i></div></div><div class='row reponse' id='r3'></div><div class='row'><i class='fa fa-plus-circle fa-1x addNewReponse' aria-hidden='true' style='position:relative;'>Ajouter réponse</i><br /></div></div>");
            }
            else {
                $("#AllQuestions").after("<div class='row question radio' id='q1' style='border:1px; border-color:#8492af; border-style:solid; border-radius:2px; margin-right:20px; margin-left:20px;'><div class='col-md-1'><i class='fa fa-times' aria-hidden='true'></i></div><label><input type='text' name='type["+count+"]' value='radio' class='type' hidden /></label><div class='introduct'><span id='numQ'>"+count+"</span><input type='text' name='intro"+count+ "' id='intro"+count+"' placeholder='Écrivez le texte de votre question...' required></div><div class='row reponse' id='r1'><div class='col-md-2 col-sm-2 col-xs-2 col-md-offset-1'><input type='radio' class='btnradio' disabled style='cursor:default; text-align:left;' required /></div><div class='col-md-6 col-sm-6 col-xs-6'><input type='text' class='reponse' name='q"+count+"r1' id='q"+count+"r1' placeholder='Réponse 1' /></div><div class='col-md-1 col-sm-1 col-xs-1'><i class='fa fa-trash fa-1x deleterep' aria-hidden='true'></i></div></div><div class='row reponse' id='r2'><div class='col-md-2 col-sm-2 col-xs-2 col-md-offset-1'><input type='radio' class='btnradio' disabled style='cursor:default; text-align:left;' /></div><div class='col-md-6 col-sm-6 col-xs-6'><input type='text' class='reponse' name='q"+count+"r2' id='q"+count+"r2' placeholder='Réponse 2' required /></div><div class='col-md-1 col-sm-1 col-xs-1'><i class='fa fa-trash fa-1x deleterep' aria-hidden='true'></i></div></div><div class='reponse' id='r3'></div><div class='row'><i class='fa fa-plus-circle fa-1x addNewReponse' aria-hidden='true' style='position:relative;'>Ajouter réponse</i><br /></div></div>");
            }
            $(".AllChoices").hide();
        });
        // </editor-fold>

        // <editor-fold desc="Sélection choix multiple">
        $(document).on("click", "#choixmultiple",function(){
            var count = $("#sondage .question").length +1;

            if((count-1) != 0) {
                $("#q" + (count - 1)).after("<div class='row question checkbox'  id='q" + count + "' style='border:1px; border-color:#8492af; border-style:solid; border-radius:2px; margin-right:20px; margin-left:20px;'><div class='col-md-1'><i class='fa fa-times' aria-hidden='true'></i></div><label><input type='text' name='type["+count+"]' value='checkbox' class='type' hidden /></label><div class='introduct'><span id='numQ'>" + count + "</span><input type='text' name='question[" + count + "][intro]' id='intro" + count + "' placeholder='Écrivez le texte de votre question...' required></div><div class='row reponse' id='r1'><div class='col-md-2 col-sm-2 col-xs-2 col-md-offset-1'><input type='checkbox' class='btnradio' disabled style='cursor:default; text-align:left;' required /></div><div class='col-md-6 col-sm-6 col-xs-6'><input type='text' class='reponse' name='reponse[" + count + "][r1]' id='q" + count + "r1' placeholder='Réponse 1' /></div><div class='col-md-1 col-sm-1 col-xs-1'><i class='fa fa-trash fa-1x deleterep' aria-hidden='true'></i></div></div><div class='row reponse' id='r2'><div class='col-md-2 col-sm-2 col-xs-2 col-md-offset-1'><input type='checkbox' class='btnradio' disabled style='cursor:default; text-align:left;' /></div><div class='col-md-6 col-sm-6 col-xs-6'><input type='text' class='reponse' name='reponse[" + count + "][r2]' id='q" + count + "r2' placeholder='Réponse 2' required /></div><div class='col-md-1 col-sm-1 col-xs-1'><i class='fa fa-trash fa-1x deleterep' aria-hidden='true'></i></div></div><div class='row reponse' id='r3'></div><div class='row'><i class='fa fa-plus-circle fa-1x addNewReponse' aria-hidden='true' style='position:relative;'>Ajouter réponse</i><br /></div></div>");
            }
            else {
                $("#AllQuestions").after("<div class='row question checkbox' id='q1' style='border:1px; border-color:#8492af; border-style:solid; border-radius:2px; margin-right:20px; margin-left:20px;'><div class='col-md-1'><i class='fa fa-times' aria-hidden='true'></i></div><label><input type='text' name='type["+count+"]' value='checkbox' class='type' hidden /></label><div class='introduct'><span id='numQ'>" + count + "</span><input type='text' name='question[" + count + "][intro]' id='intro" + count + "' placeholder='Écrivez le texte de votre question...' required></div><div class='row reponse'><div class='col-md-2 col-sm-2 col-xs-2 col-md-offset-1'><input type='checkbox' class='btnradio' disabled style='cursor:default; text-align:left;' required /></div><div class='col-md-6 col-sm-6 col-xs-6'><input type='text' class='reponse' name='reponse[" + count + "][r1]' id='q" + count + "r1' placeholder='Réponse 1' /></div><div class='col-md-1 col-sm-1 col-xs-1'><i class='fa fa-trash fa-1x deleterep' aria-hidden='true'></i></div></div><div class='row reponse'><div class='col-md-2 col-sm-2 col-xs-2 col-md-offset-1'><input type='checkbox' class='btnradio' disabled style='cursor:default; text-align:left;' /></div><div class='col-md-6 col-sm-6 col-xs-6'><input type='text' class='reponse' name='reponse[" + count + "][r2]' id='q" + count + "r2' placeholder='Réponse 2' required /></div><div class='col-md-1 col-sm-1 col-xs-1'><i class='fa fa-trash fa-1x deleterep' aria-hidden='true'></i></div></div><div class='row reponse' id='r3'></div><div class='row'><i class='fa fa-plus-circle fa-1x addNewReponse' aria-hidden='true' style='position:relative;'>Ajouter réponse</i><br /></div></div>");
            }
            $(".AllChoices").hide();
        });
        // </editor-fold>

        // <editor-fold desc="Sélection réponse textuelle">
        $(document).on("click", "#reponsetextuelle", function(){
            var count = $("#sondage .question").length +1;

            if((count-1) != 0) {
                $("#q" + (count - 1)).after("<div class='row question text' id='q" + count + "' style='border:1px; border-color:#8492af; border-style:solid; border-radius:2px; margin-right:20px; margin-left:20px;'><div class='col-md-1'><i class='fa fa-times' aria-hidden='true'></i></div><label><input type='text' name='type["+count+"]' value='textuelle' class='type' hidden /></label><div class='introduct'><span id='numQ'>" + count + "</span><input type='text' name='question["+count+"][intro]' id='intro" + count + "' placeholder='Écrivez le texte de votre question...' required></div><div class='row reponse' id='r1'><div class='col-md-12 col-sm-12 col-xs-12'></div><div class='col-md-6 col-sm-6 col-xs-6 col-md-push-3'><input type='text' class='reponse' name='reponse["+count+"][r1]' id='q" + count + "r1' placeholder='Réponse 1' /></div><div class='col-md-1 col-sm-1 col-xs-1 col-md-push-3'><i class='fa fa-trash fa-1x deleterep' aria-hidden='true'></i></div></div><div class='row reponse' id='r2'><div class='col-md-12 col-sm-12 col-xs-12'></div><div class='col-md-6 col-sm-6 col-xs-6 col-md-push-3'><input type='text' class='reponse' name='reponse["+count+"][r2]' id='q" + count + "r2' placeholder='Réponse 2' required /></div><div class='col-md-1 col-sm-1 col-xs-1 col-md-push-3'><i class='fa fa-trash fa-1x deleterep' aria-hidden='true'></i></div></div><div class='row reponse' id='r3'></div><div class='row'><i class='fa fa-plus-circle fa-1x addNewReponse' aria-hidden='true' style='position:relative;'>Ajouter réponse</i><br /></div></div>");
            }
            else {
                $("#AllQuestions").after("<div class='row question text' id='q1' style='border:1px; border-color:#8492af; border-style:solid; border-radius:2px; margin-right:20px; margin-left:20px;'><div class='col-md-1'><i class='fa fa-times' aria-hidden='true'></i></div><label><input type='text' name='type["+count+"]' value='textuelle' class='type' hidden /></label><div class='introduct'><span id='numQ'>" + count + "</span><input type='text' name='question["+count+"][intro]' id='intro" + count + "' placeholder='Écrivez le texte de votre question...' required></div><div class='row reponse'><div class='col-md-12 col-sm-12 col-xs-12'></div><div class='col-md-6 col-sm-6 col-xs-6 col-md-push-3'><input type='text' class='reponse' name='reponse["+count+"][r1]' id='q" + count + "r1' placeholder='Réponse 1' /></div><div class='col-md-1 col-sm-1 col-xs-1 col-md-push-3'><i class='fa fa-trash fa-1x deleterep' aria-hidden='true'></i></div></div><div class='row reponse'><div class='col-md-12 col-sm-12 col-xs-12'></div><div class='col-md-6 col-sm-6 col-xs-6 col-md-push-3'><input type='text' class='reponse' name='reponse["+count+"][r2]' id='q" + count + "r2' placeholder='Réponse 2' required /></div><div class='col-md-1 col-sm-1 col-xs-1 col-md-push-3'><i class='fa fa-trash fa-1x deleterep' aria-hidden='true'></i></div></div><div class='row reponse' id='r3'></div><div class='row'><i class='fa fa-plus-circle fa-1x addNewReponse' aria-hidden='true' style='position:relative;'>Ajouter réponse</i><br /></div></div>");
            }
            $(".AllChoices").hide();
        });
        // </editor-fold>

        // <editor-fold desc="Sélection choix image unique">
        $(document).on("click", "#choixuniqueimage", function(){
            var count = $("#sondage .question").length +1;

            $(".test").append("<div class='row question uniqueimage' style='border:1px; border-color:#8492af; border-style:solid; border-radius:2px; margin-right:20px; margin-left:20px;' id='q"+count+"'><div class='col-md-1'><i class='fa fa-times' aria-hidden='true'></i></div><div class='introduct'><span id='numQ'>"+count+"</span><input type='text' name='intro"+count+"' id='intro"+count+"' placeholder='Écrivez le texte de votre question...' required></div><div class='row reponse'><div class='col-md-12 col-sm-12 col-xs-12'></div><div class='col-md-6 col-sm-6 col-xs-6 col-md-push-3'><input type='file' id='file-input-uniqueimage' style='border-style:none;'></div><div class='col-md-1 col-sm-1 col-xs-1 col-md-push-3'></div></div><div id='result' class='result'></div><div class='row'><i class='fa fa-plus-circle fa-1x addNewReponse' aria-hidden='true' style='position:relative;'>Ajouter réponse</i><br /></div></div>");

            $(".AllChoices").hide();
        });
        // </editor-fold>

        // <editor-fold desc="Sélection choix image multiple">
        $("#choixmultipleimage").click(function(){

            $(".AllChoices").hide();
        });
        // </editor-fold>

        // <editor-fold desc="Sélection choix étoile">
        $("#choixetoile").click(function(){

            $(".AllChoices").hide();
        });
        // </editor-fold>

        $(document).on("click",".deleterepimage",function(){
            var x = $(this).parent();
            x = x.parent();
            x = x.parent();
            x.remove();

        });

        // <editor-fold desc="Supprimer une réponse">
        $(document).on("click",".deleterep",function(){
            var x = $(this).parent();
            x = x.parent();
            var NumQ = x.parent().attr('id').substring(1, 2);
            //alert(NumQ);

            //Mettre les réponses à jours (id et name)
            var numR = x.attr('id').substring(1); // numéro de la réponse supprimé
            var temp = x.parent();
            temp = temp.attr('id');
            var count = $("#"+temp+" .row").length -2; // nb réponse dans la question

            var nbReponseAfter = count - numR; // nb réponse à mettre à jour

            if(numR != count){
                for(var i = 1; i <= nbReponseAfter; i++){
                    var id = (parseInt(numR) + i);
                    var id2 = (id - 1);

//                    $('#r'+id).find('.reponse').attr('placeholder', 'Réponse '+id2);
//                    $('#r'+id).attr('id', 'r'+id2);
alert(NumQ);
                    $('#q'+NumQ+'r'+id).attr({
                        'placeholder': 'Réponse '+id2,
                        'name': 'reponse['+NumQ+'][r'+id2+']',  //(NumQ+'r'+id2),
                        'id': 'q'+NumQ+'r'+id2//(NumQ+'r'+id2)
                    });
//                    $('#r'+id).find('.reponse').attr({
//                        'placeholder': 'Réponse '+id2,
//                        'name': 'reponse['+NumQ+'][r'+id2+']',  //(NumQ+'r'+id2),
//                        'id': 'q'+NumQ+'r'+id2//(NumQ+'r'+id2)
//                    });

                    $('#q'+NumQ).find('#r'+id).attr('id', 'r'+id2);
                    //$('#r'+id).attr('id', 'r'+id2);

                }

                //$('$r'+(nbReponseAfter+3)).attr({'id' : 'r'+(nbReponseAfter+2)});
            }
            x.remove();
            $('#q'+NumQ).find('#r'+(count+1)).attr({'id' : 'r'+(count)});
//            $('#r'+(count+1)).attr({'id' : 'r'+(count)});
        });
        // </editor-fold>

        // <editor-fold desc="Supprimer une question">
        $(document).on("click",".fa-times",function(){
            var x = $(this).parent();
            x = x.parent(); // la question

            var numQ = x.attr('id').substring(1); // num question supprimé
            var count = $(".question").length; // nb question
alert(numQ);
            var nbQuestionAfter = count - numQ; // nb question à mettre à jour

            if(numQ != count){
                for(var i = 1; i <= nbQuestionAfter; i++){

                    var id = (parseInt(numQ) + i);
                    var id2 = (id - 1);

                    $('#q'+id).children('.introduct').children('#numQ').html(id2);
                    $('#q'+id).find('.type').attr('name', 'type['+id2+']');
                    $('#q'+id).attr('id', 'q'+id2);
                    x.remove();

                    $('#intro'+id).attr({
                        id: 'intro'+id2,
                        name: 'question['+id2+'][intro]'
                    });

                    var nbReponseAfter = $('#q'+id2 +" .row").length-2;
                    //alert('#q'+id2 + "   " + nbReponseAfter);

                    for(var r = 1; r <= nbReponseAfter; r++){
                        //alert('#q'+id+'r'+r);
                        $('#q'+id+'r'+r).attr({
                            id: 'q'+id2+'r'+r,
                            name: 'reponse['+id2+'][r'+r+']'
                        });
                    }


                }
            }
//            x.remove();
        });
        // </editor-fold>

        // <editor-fold desc="Creer nouvelle réponse">
        $(document).on("click",".addNewReponse",function(){
            var question = $(this).parent();
            question = question.parent();
            var NumQuestion = question.attr('id').substring(1, 2); // Numéro de la question
            question = question.attr('class');
            question = question.substring(13);


            // vérifier type de réponse pour ajouter le bon bouton (exemple : radio / image ...)
            var x = $(this).parent();
            x = x.parent();

            var nbRep = $('#'+x.attr('id') + ' .row').length-1; // -1 car il y a deux réponses + 1 row en prévision de la 3e réponse
            alert(NumQuestion + " - " + nbRep);

            if(question == 'radio'){
                $(x).children("#r"+nbRep).append("<div class='col-md-2 col-sm-2 col-xs-2 col-md-offset-1'><input type='radio' disabled style='cursor:default; text-align:left;' /></div><div class='col-md-6 col-sm-6 col-xs-6'><input type='text' class='reponse' name='reponse["+NumQuestion+"][r"+nbRep+"]' id='q"+NumQuestion+"r"+nbRep+"' placeholder='Réponse "+nbRep+"' required /></div><div class='col-md-1 col-sm-1 col-xs-1'><i class='fa fa-trash fa-1x deleterep' aria-hidden='true'></i></div>");
                $(x).children("#r"+nbRep).after("<div class='row reponse' id='r"+(nbRep+1)+"'></div>");
            }
            if(question == 'checkbox'){
                $(x).children("#r"+nbRep).append("<div class='col-md-2 col-sm-2 col-xs-2 col-md-offset-1'><input type='checkbox' disabled style='cursor:default; text-align:left;' /></div><div class='col-md-6 col-sm-6 col-xs-6'><input type='text' class='reponse' name='reponse["+NumQuestion+"][r"+nbRep+"]' id='q"+NumQuestion+"r"+nbRep+"' placeholder='Réponse "+nbRep+"' required /></div><div class='col-md-1 col-sm-1 col-xs-1'><i class='fa fa-trash fa-1x deleterep' aria-hidden='true'></i></div>");
                $(x).children("#r"+nbRep).after("<div class='row reponse' id='r"+(nbRep+1)+"'></div>");
            }
            if(question == 'text'){
                $(x).children("#r"+nbRep).append("<div class='col-md-12 col-sm-12 col-xs-12'></div><div class='col-md-6 col-sm-6 col-xs-6 col-md-push-3'><input type='text' class='reponse' name='reponse["+NumQuestion+"][r"+nbRep+"]' id='q"+NumQuestion+"r"+nbRep+"' placeholder='Réponse "+nbRep+"' required /></div><div class='col-md-1 col-sm-1 col-xs-1 col-md-push-3'><i class='fa fa-trash fa-1x deleterep' aria-hidden='true'></i></div>");
                $(x).children("#r"+nbRep).after("<div class='row reponse' id='r"+(nbRep+1)+"'></div>");
            }
            if(question == 'uniqueimage'){
                $(x).children("#r"+nbRep).append("<div class='row reponse'><div class='col-md-12 col-sm-12 col-xs-12'></div><div class='col-md-6 col-sm-6 col-xs-6 col-md-push-3'><input type='text' class='reponse' name='reponse["+NumQuestion+"][r"+nbRep+"]' id='q"+NumQuestion+"r"+nbRep+"' placeholder='Réponse "+nbRep+"' required /></div><div class='col-md-1 col-sm-1 col-xs-1 col-md-push-3'><i class='fa fa-trash fa-1x deleterep' aria-hidden='true'></i></div>");
                $(x).children("#r"+nbRep).after("<div class='row reponse' id='r"+(nbRep+1)+"'></div>");
            }
            if(question == 'multipleimage'){

            }
            if(question == 'etoile'){

            }
        });
        // </editor-fold>
    });
</script>

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

    /*.btn span.glyphicon {*/
        /*opacity: 0;*/
    /*}*/
    /*.btn.active span.glyphicon {*/
        /*opacity: 1;*/
    /*}*/
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
