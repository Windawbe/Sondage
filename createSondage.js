
function sendDate(){
    $('#date').val($('#datedebut').val().replace(/\//g, ''));
    $('#date2').val($('#datefin').val().replace(/\//g, ''));
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
        $("#nQuestion").val($("#sondage .question").length);
    });

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
        $( ".newchoice" ).append("<div class='AllChoices'><img class='brightness choixunique' src='Images/a.png' /><img class='brightness' id='choixmultiple' src='Images/b.png' /><img class='brightness' id='reponsetextuelle' src='Images/c.png' /><img class='brightness' id='choixuniqueimage' src='Images/d.png' /><img class='brightness' id='choixmultipleimage' src='Images/e.png' /><img class='brightness' id='choixetoile' src='Images/f.png' /></div></div>");
    });
    // </editor-fold>

    // <editor-fold desc="Sélection choix unique">
    $(document).on("click",".choixunique",function(){
        var count = $("#sondage .question").length +1;
        if((count-1) != 0)
        {
            $("#q" + (count - 1)).after("<div class='row question radio' id='q" + count + "' style='border:1px; border-color:#8492af; border-style:solid; border-radius:2px; margin-right:20px; margin-left:20px;'><div class='col-md-1'><i class='fa fa-times' aria-hidden='true'></i></div><label><input type='text' name='type["+count+"]' value='radio' class='type' hidden /></label><div class='introduct'><span id='numQ'>" + count + "</span><input type='text' name='question["+count+"][intro]' id='intro" + count + "' placeholder='Écrivez le texte de votre question...' required></div><div class='row reponse' id='r1'><div class='col-md-2 col-sm-2 col-xs-2 col-md-offset-1'><input type='radio' class='btnradio' disabled style='cursor:default; text-align:left;' required /></div><div class='col-md-6 col-sm-6 col-xs-6'><input type='text' class='reponse' name='reponse["+count+"][r1]' id='q" + count + "r1' placeholder='Réponse 1' /></div><div class='col-md-1 col-sm-1 col-xs-1'><i class='fa fa-trash fa-1x deleterep' aria-hidden='true'></i></div></div><div class='row reponse' id='r2'><div class='col-md-2 col-sm-2 col-xs-2 col-md-offset-1'><input type='radio' class='btnradio' disabled style='cursor:default; text-align:left;' /></div><div class='col-md-6 col-sm-6 col-xs-6'><input type='text' class='reponse' name='reponse["+count+"][r2]' id='q" + count + "r2' placeholder='Réponse 2' required /></div><div class='col-md-1 col-sm-1 col-xs-1'><i class='fa fa-trash fa-1x deleterep' aria-hidden='true'></i></div></div><div class='row reponse' id='r3'></div><div class='row'><i class='fa fa-plus-circle fa-1x addNewReponse' aria-hidden='true' style='position:relative;'>Ajouter réponse</i><br /></div></div>");
        }
        else {
            $("#AllQuestions").after("<div class='row question radio' id='q1' style='border:1px; border-color:#8492af; border-style:solid; border-radius:2px; margin-right:20px; margin-left:20px;'><div class='col-md-1'><i class='fa fa-times' aria-hidden='true'></i></div><label><input type='text' name='type["+count+"]' value='radio' class='type' hidden /></label><div class='introduct'><span id='numQ'>"+count+"</span><input type='text' name='question["+count+ "][intro]' id='intro"+count+"' placeholder='Écrivez le texte de votre question...' required></div><div class='row reponse' id='r1'><div class='col-md-2 col-sm-2 col-xs-2 col-md-offset-1'><input type='radio' class='btnradio' disabled style='cursor:default; text-align:left;' required /></div><div class='col-md-6 col-sm-6 col-xs-6'><input type='text' class='reponse' name='reponse["+count+"][r1]' id='q"+count+"r1' placeholder='Réponse 1' /></div><div class='col-md-1 col-sm-1 col-xs-1'><i class='fa fa-trash fa-1x deleterep' aria-hidden='true'></i></div></div><div class='row reponse' id='r2'><div class='col-md-2 col-sm-2 col-xs-2 col-md-offset-1'><input type='radio' class='btnradio' disabled style='cursor:default; text-align:left;' /></div><div class='col-md-6 col-sm-6 col-xs-6'><input type='text' class='reponse' name='reponse["+count+"][r2]' id='q"+count+"r2' placeholder='Réponse 2' required /></div><div class='col-md-1 col-sm-1 col-xs-1'><i class='fa fa-trash fa-1x deleterep' aria-hidden='true'></i></div></div><div class='row reponse' id='r3'></div><div class='row'><i class='fa fa-plus-circle fa-1x addNewReponse' aria-hidden='true' style='position:relative;'>Ajouter réponse</i><br /></div></div>");
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
            $("#AllQuestions").after("<div class='row question checkbox' id='q1' style='border:1px; border-color:#8492af; border-style:solid; border-radius:2px; margin-right:20px; margin-left:20px;'><div class='col-md-1'><i class='fa fa-times' aria-hidden='true'></i></div><label><input type='text' name='type["+count+"]' value='checkbox' class='type' hidden /></label><div class='introduct'><span id='numQ'>" + count + "</span><input type='text' name='question[" + count + "][intro]' id='intro" + count + "' placeholder='Écrivez le texte de votre question...' required></div><div class='row reponse' id='r1'><div class='col-md-2 col-sm-2 col-xs-2 col-md-offset-1'><input type='checkbox' class='btnradio' disabled style='cursor:default; text-align:left;' required /></div><div class='col-md-6 col-sm-6 col-xs-6'><input type='text' class='reponse' name='reponse[" + count + "][r1]' id='q" + count + "r1' placeholder='Réponse 1' /></div><div class='col-md-1 col-sm-1 col-xs-1'><i class='fa fa-trash fa-1x deleterep' aria-hidden='true'></i></div></div><div class='row reponse' id='r2'><div class='col-md-2 col-sm-2 col-xs-2 col-md-offset-1'><input type='checkbox' class='btnradio' disabled style='cursor:default; text-align:left;' /></div><div class='col-md-6 col-sm-6 col-xs-6'><input type='text' class='reponse' name='reponse[" + count + "][r2]' id='q" + count + "r2' placeholder='Réponse 2' required /></div><div class='col-md-1 col-sm-1 col-xs-1'><i class='fa fa-trash fa-1x deleterep' aria-hidden='true'></i></div></div><div class='row reponse' id='r3'></div><div class='row'><i class='fa fa-plus-circle fa-1x addNewReponse' aria-hidden='true' style='position:relative;'>Ajouter réponse</i><br /></div></div>");
        }
        $(".AllChoices").hide();
    });
    // </editor-fold>

    // <editor-fold desc="Sélection réponse textuelle">
    $(document).on("click", "#reponsetextuelle", function(){
        var count = $("#sondage .question").length +1;

        if((count-1) != 0) {
            $("#q" + (count - 1)).after("<div class='row question textuelle' id='q" + count + "' style='border:1px; border-color:#8492af; border-style:solid; border-radius:2px; margin-right:20px; margin-left:20px;'><div class='col-md-1'><i class='fa fa-times' aria-hidden='true'></i></div><label><input type='text' name='type["+count+"]' value='textuelle' class='type' hidden /></label><div class='introduct'><span id='numQ'>" + count + "</span><input type='text' name='question["+count+"][intro]' id='intro" + count + "' placeholder='Écrivez le texte de votre question...' required></div><div class='row reponse' id='r1'><div class='col-md-12 col-sm-12 col-xs-12'></div><div class='col-md-6 col-sm-6 col-xs-6 col-md-push-3'><input type='text' readonly class='reponse' name='reponse["+count+"][r1]' id='q" + count + "r1' placeholder='Réponse 1' /></div><div class='col-md-1 col-sm-1 col-xs-1 col-md-push-3'></div></div><br /></div>");
        }
        else {
            $("#AllQuestions").after("<div class='row question textuelle' id='q1' style='border:1px; border-color:#8492af; border-style:solid; border-radius:2px; margin-right:20px; margin-left:20px;'><div class='col-md-1'><i class='fa fa-times' aria-hidden='true'></i></div><label><input type='text' name='type["+count+"]' value='textuelle' class='type' hidden /></label><div class='introduct'><span id='numQ'>" + count + "</span><input type='text' name='question["+count+"][intro]' id='intro" + count + "' placeholder='Écrivez le texte de votre question...' required></div><div class='row reponse' id='r1'><div class='col-md-12 col-sm-12 col-xs-12'></div><div class='col-md-6 col-sm-6 col-xs-6 col-md-push-3'><input type='text' readonly class='reponse' name='reponse["+count+"][r1]' id='q" + count + "r1' placeholder='Réponse 1' /></div><div class='col-md-1 col-sm-1 col-xs-1 col-md-push-3'></div></div><br /></div>");
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

                $('#q'+NumQ+'r'+id).attr({
                    'placeholder': 'Réponse '+id2,
                    'name': 'reponse['+NumQ+'][r'+id2+']',  //(NumQ+'r'+id2),
                    'id': 'q'+NumQ+'r'+id2//(NumQ+'r'+id2)
                });

                $('#q'+NumQ).find('#r'+id).attr('id', 'r'+id2);
            }
        }
        x.remove();
        $('#q'+NumQ).find('#r'+(count+1)).attr({'id' : 'r'+(count)});
    });
    // </editor-fold>

    // <editor-fold desc="Supprimer une question">
    $(document).on("click",".fa-times",function(){
        var x = $(this).parent();
        x = x.parent(); // la question

        var numQ = x.attr('id').substring(1); // num question supprimé
        var count = $(".question").length; // nb question
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

                for(var r = 1; r <= nbReponseAfter; r++){
                    $('#q'+id+'r'+r).attr({
                        id: 'q'+id2+'r'+r,
                        name: 'reponse['+id2+'][r'+r+']'
                    });
                }


            }
        }
        x.remove();
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

        if(question == 'radio'){
            $(x).children("#r"+nbRep).append("<div class='col-md-2 col-sm-2 col-xs-2 col-md-offset-1'><input type='radio' disabled style='cursor:default; text-align:left;' /></div><div class='col-md-6 col-sm-6 col-xs-6'><input type='text' class='reponse' name='reponse["+NumQuestion+"][r"+nbRep+"]' id='q"+NumQuestion+"r"+nbRep+"' placeholder='Réponse "+nbRep+"' required /></div><div class='col-md-1 col-sm-1 col-xs-1'><i class='fa fa-trash fa-1x deleterep' aria-hidden='true'></i></div>");
            $(x).children("#r"+nbRep).after("<div class='row reponse' id='r"+(nbRep+1)+"'></div>");
        }
        if(question == 'checkbox'){
            $(x).children("#r"+nbRep).append("<div class='col-md-2 col-sm-2 col-xs-2 col-md-offset-1'><input type='checkbox' disabled style='cursor:default; text-align:left;' /></div><div class='col-md-6 col-sm-6 col-xs-6'><input type='text' class='reponse' name='reponse["+NumQuestion+"][r"+nbRep+"]' id='q"+NumQuestion+"r"+nbRep+"' placeholder='Réponse "+nbRep+"' required /></div><div class='col-md-1 col-sm-1 col-xs-1'><i class='fa fa-trash fa-1x deleterep' aria-hidden='true'></i></div>");
            $(x).children("#r"+nbRep).after("<div class='row reponse' id='r"+(nbRep+1)+"'></div>");
        }
        if(question == 'textuelle'){
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