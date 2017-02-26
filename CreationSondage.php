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
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="login-logo" style="margin-top:10px; margin-left:10px;">
                                        <i class="fa fa-3x fa-file-text" aria-hidden="true" style="color:white;"></i>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="login-details">
                                        <ul class="nav nav-tabs navbar-right">
                                            <li class="active"><a data-toggle="tab" href="#gerer">Gérer vos sondages</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content">
                            <div id="login" class="tab-pane fade in active">
                                <div class="login-inner">
                                    <div class="title">
                                        <center><span>Création de sondage</span></center>
                                    </div>
                                    <div class="login-form">
                                        <form method="post" action="Parametrage.php">
                                            <div class="form-details" id="sondage"> <!-- REGARDER ICI le nb question -->
                                                <label class="titre">
                                                    <input type="text" name="titre" placeholder="Titre du sondage" id="titre" required>
                                                </label>
                                                <label class="intro">
                                                    <input type="text" name="intro" placeholder="Texte d'introduction" id="titre" required>
                                                </label>

                                                <div class="row" style="margin-left:30px; text-align:left; color:#a9abae; font-size:16px; font-weight: 300;">Questions</div>
                                                <!-- QUESTION 1-->
                                                <div class='row question radio' style="border:1px; border-color:#8492af; border-style:solid; border-radius:2px; margin-right:20px; margin-left:20px;" id="q1">
                                                    <div class="col-md-1"><i class="fa fa-times" aria-hidden="true"></i></div>
                                                    <div class='introduct'><text id='numQ'>1</text><input type="text" name="intro" placeholder="Écrivez le texte de votre question..." id="titre" required></div>
                                                    <!-- Reponse 1-->
                                                    <div class="row reponse" id='r1'>
                                                        <div class="col-md-2 col-sm-2 col-xs-2 col-md-offset-1">
                                                            <input type="radio" class="btnradio" disabled style="cursor:default; text-align:left;" />
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                                            <input type="text" class="reponse" placeholder="Réponse 1" required />
                                                        </div>
                                                        <div class="col-md-1 col-sm-1 col-xs-1">
                                                            <i class="fa fa-trash fa-1x deleterep" aria-hidden="true"></i> 
                                                        </div>
                                                    </div>
                                                    <!-- Reponse 2-->
                                                    <div class="row reponse" id='r2'>
                                                        <div class="col-md-2 col-sm-2 col-xs-2 col-md-offset-1">
                                                            <input type="radio" class="btnradio" disabled style="cursor:default; text-align:left;" />
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                                            <input type="text" class="reponse" placeholder="Réponse 2" required />
                                                        </div>
                                                        <div class="col-md-1 col-sm-1 col-xs-1">
                                                            <i class="fa fa-trash fa-1x deleterep" aria-hidden="true"></i> 
                                                        </div>
                                                    </div>
                                                    <div class="rep">

                                                    </div>
                                                    <div class='row'>
                                                        <i class="fa fa-plus-circle fa-1x addNewReponse" aria-hidden="true" style="position:relative;">Ajouter réponse</i>
                                                        <br />
                                                    </div>
                                                </div>
                                                <div class="test"></div>
                                                <div class="newchoice"></div>
                                                <!-- Ajout d'une nouvelle question -->
                                                <div class="addQuestion" style="color:#b0c900;">
                                                    <i class="fa fa-plus-circle addQ" aria-hidden="true" style="font-size:50px; font-weight: 300;"></i>
                                                </div>
                                                <br /><br />
                                                <button type="submit" class="form-btn" onsubmit="">Créer</button>
                                                
                                                <!-- TESTTTTTTTTT -->

<!--
                                                <div id="result" class="result">
                                                    
                                                </div>
-->

                                                <!-- FIN TESTTTTT-->                                                
                                            </div>
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

<script>
    $(document).ready(function() {
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

        
        //creer nouvelle question
        $(".addQ").click(function(){
            $( ".newchoice" ).append("<div class='AllChoices'><img class='brightness choixunique' src='Images/a.jpg' /><img class='brightness' id='choixmultiple' src='Images/b.jpg' /><img class='brightness' id='reponsetextuelle' src='Images/c.jpg' /><img class='brightness' id='choixuniqueimage' src='Images/d.jpg' /><img class='brightness' id='choixmultipleimage' src='Images/e.jpg' /><img class='brightness' id='choixetoile' src='Images/f.jpg' /></div></div>");
        });

        // Sélection choix unique
        $(document).on("click",".choixunique",function(){
            var count = $("#sondage .question").length +1;

            $(".test").append("<div class='row question radio' style='border:1px; border-color:#8492af; border-style:solid; border-radius:2px; margin-right:20px; margin-left:20px;' id='q"+count+"'><div class='col-md-1'><i class='fa fa-times' aria-hidden='true'></i></div><div class='introduct'><text id='numQ'>"+count+"</text><input type='text' name='intro' placeholder='Écrivez le texte de votre question...' id='titre' required></div><div class='row reponse'><div class='col-md-2 col-sm-2 col-xs-2 col-md-offset-1'><input type='radio' class='btnradio' disabled style='cursor:default; text-align:left;' required /></div><div class='col-md-6 col-sm-6 col-xs-6'><input type='text' class='reponse' placeholder='Réponse 1' /></div><div class='col-md-1 col-sm-1 col-xs-1'><i class='fa fa-trash fa-1x deleterep' aria-hidden='true'></i></div></div><div class='row reponse'><div class='col-md-2 col-sm-2 col-xs-2 col-md-offset-1'><input type='radio' class='btnradio' disabled style='cursor:default; text-align:left;' /></div><div class='col-md-6 col-sm-6 col-xs-6'><input type='text' class='reponse' placeholder='Réponse 2' required /></div><div class='col-md-1 col-sm-1 col-xs-1'><i class='fa fa-trash fa-1x deleterep' aria-hidden='true'></i></div></div><div class='rep'></div><div class='row'><i class='fa fa-plus-circle fa-1x addNewReponse' aria-hidden='true' style='position:relative;'>Ajouter réponse</i><br /></div></div>");

            $(".AllChoices").hide();
        });

        // Sélection choix multiple
        $(document).on("click", "#choixmultiple",function(){
            var count = $("#sondage .question").length +1;

            $(".test").append("<div class='row question checkbox' style='border:1px; border-color:#8492af; border-style:solid; border-radius:2px; margin-right:20px; margin-left:20px;' id='q"+count+"'><div class='col-md-1'><i class='fa fa-times' aria-hidden='true'></i></div><div class='introduct'><text id='numQ'>"+count+"</text><input type='text' name='intro' placeholder='Écrivez le texte de votre question...' id='titre' required></div><div class='row reponse'><div class='col-md-2 col-sm-2 col-xs-2 col-md-offset-1'><input type='checkbox' class='btnradio' disabled style='cursor:default; text-align:left;' required /></div><div class='col-md-6 col-sm-6 col-xs-6'><input type='text' class='reponse' placeholder='Réponse 1' /></div><div class='col-md-1 col-sm-1 col-xs-1'><i class='fa fa-trash fa-1x deleterep' aria-hidden='true'></i></div></div><div class='row reponse'><div class='col-md-2 col-sm-2 col-xs-2 col-md-offset-1'><input type='checkbox' class='btnradio' disabled style='cursor:default; text-align:left;' /></div><div class='col-md-6 col-sm-6 col-xs-6'><input type='text' class='reponse' placeholder='Réponse 2' required /></div><div class='col-md-1 col-sm-1 col-xs-1'><i class='fa fa-trash fa-1x deleterep' aria-hidden='true'></i></div></div><div class='rep'></div><div class='row'><i class='fa fa-plus-circle fa-1x addNewReponse' aria-hidden='true' style='position:relative;'>Ajouter réponse</i><br /></div></div>");

            $(".AllChoices").hide();
        });

        // Sélection réponse textuelle
        $(document).on("click", "#reponsetextuelle", function(){
            var count = $("#sondage .question").length +1;

            $(".test").append("<div class='row question text' style='border:1px; border-color:#8492af; border-style:solid; border-radius:2px; margin-right:20px; margin-left:20px;' id='q"+count+"'><div class='col-md-1'><i class='fa fa-times' aria-hidden='true'></i></div><div class='introduct'><text id='numQ'>"+count+"</text><input type='text' name='intro' placeholder='Écrivez le texte de votre question...' id='titre' required></div><div class='row reponse'><div class='col-md-12 col-sm-12 col-xs-12'></div><div class='col-md-6 col-sm-6 col-xs-6 col-md-push-3'><input type='text' class='reponse' placeholder='Réponse 1' /></div><div class='col-md-1 col-sm-1 col-xs-1 col-md-push-3'><i class='fa fa-trash fa-1x deleterep' aria-hidden='true'></i></div></div><div class='row reponse'><div class='col-md-12 col-sm-12 col-xs-12'></div><div class='col-md-6 col-sm-6 col-xs-6 col-md-push-3'><input type='text' class='reponse' placeholder='Réponse 2' required /></div><div class='col-md-1 col-sm-1 col-xs-1 col-md-push-3'><i class='fa fa-trash fa-1x deleterep' aria-hidden='true'></i></div></div><div class='rep'></div><div class='row'><i class='fa fa-plus-circle fa-1x addNewReponse' aria-hidden='true' style='position:relative;'>Ajouter réponse</i><br /></div></div>");
            
            $(".AllChoices").hide();
        });

        // Sélection choix image unique
        $(document).on("click", "#choixuniqueimage", function(){
            var count = $("#sondage .question").length +1;

            $(".test").append("<div class='row question uniqueimage' style='border:1px; border-color:#8492af; border-style:solid; border-radius:2px; margin-right:20px; margin-left:20px;' id='q"+count+"'><div class='col-md-1'><i class='fa fa-times' aria-hidden='true'></i></div><div class='introduct'><text id='numQ'>"+count+"</text><input type='text' name='intro' placeholder='Écrivez le texte de votre question...' id='titre' required></div><div class='row reponse'><div class='col-md-12 col-sm-12 col-xs-12'></div><div class='col-md-6 col-sm-6 col-xs-6 col-md-push-3'><input type='file' id='file-input-uniqueimage' style='border-style:none;'></div><div class='col-md-1 col-sm-1 col-xs-1 col-md-push-3'></div></div><div id='result' class='result'></div><div class='row'><i class='fa fa-plus-circle fa-1x addNewReponse' aria-hidden='true' style='position:relative;'>Ajouter réponse</i><br /></div></div>");
            
            $(".AllChoices").hide();
        });

        // Sélection choix image multiple
        $("#choixmultipleimage").click(function(){

            $(".AllChoices").hide();
        });

        // Sélection choix étoile
        $("#choixetoile").click(function(){

            $(".AllChoices").hide();
        });

        $("#testtt").click(function(){
            alert("test");
        });

        $(document).on("click",".deleterep",function(){
            var x = $(this).parent();
            x = x.parent();
            x.remove();

        });
        
        $(document).on("click",".deleterepimage",function(){
            var x = $(this).parent();
            x = x.parent();
            x = x.parent();
            x.remove();

        });

        $(document).on("click",".fa-times",function(){
            var x = $(this).parent();
            x = x.parent(); // la question
            
            var numQ = x.attr('id').substring(1); // num question supprimé
            var count = $("#sondage .question").length; // nb question

            var nbQuestionAfter = count - numQ; // nb question à mettre à jour

            if(numQ != count){ 
                for(var i = 1; i <= nbQuestionAfter; i++){
                    var id = (parseInt(numQ) + i);
                    var id2 = (id - 1);
                    
                    $('#q'+id).children('.introduct').children('#numQ').html(id2);
                    $('#q'+id).attr('id', 'q'+id2);
                }
            }
            x.remove();
        });

        $(document).on("click",".addNewReponse",function(){
            var question = $(this).parent();
            question = question.parent();
            question = question.attr('class');
            question = question.substring(13);
            alert(question);
            
            // vérifier type de réponse pour ajouter le bon bouton (exemple : radio / image ...)
            var x = $(this).parent();
            x = x.parent();
            
            if(question == 'radio'){
                $(x).children(".rep").append("<div class='row'><div class='col-md-2 col-sm-2 col-xs-2 col-md-offset-1'><input type='radio'  disabled style='cursor:default; text-align:left;' /></div><div class='col-md-6 col-sm-6 col-xs-6'><input type='text' class='reponse' placeholder='Réponse supplémentaire' required /></div><div class='col-md-1 col-sm-1 col-xs-1'><i class='fa fa-trash fa-1x deleterep' aria-hidden='true'></i></div></div>");   
            }
            if(question == 'checkbox'){
                $(x).children(".rep").append("<div class='row'><div class='col-md-2 col-sm-2 col-xs-2 col-md-offset-1'><input type='checkbox' disabled style='cursor:default; text-align:left;' /></div><div class='col-md-6 col-sm-6 col-xs-6'><input type='text' class='reponse' placeholder='Réponse supplémentaire' required /></div><div class='col-md-1 col-sm-1 col-xs-1'><i class='fa fa-trash fa-1x deleterep' aria-hidden='true'></i></div></div>");   
            }
            if(question == 'text'){
                $(x).children(".rep").append("<div class='row'><div class='col-md-12 col-sm-12 col-xs-12'></div><div class='col-md-6 col-sm-6 col-xs-6 col-md-push-3'><input type='text' class='reponse' placeholder='Réponse supplémentaire' required /></div><div class='col-md-1 col-sm-1 col-xs-1 col-md-push-3'><i class='fa fa-trash fa-1x deleterep' aria-hidden='true'></i></div></div>"); 
            }
            if(question == 'uniqueimage'){
                $(x).children(".rep").append("<div class='row'><div class='col-md-12 col-sm-12 col-xs-12'></div><div class='col-md-6 col-sm-6 col-xs-6 col-md-push-3'><input type='text' class='reponse' placeholder='Réponse supplémentaire' required /></div><div class='col-md-1 col-sm-1 col-xs-1 col-md-push-3'><i class='fa fa-trash fa-1x deleterep' aria-hidden='true'></i></div></div>"); 
            }
            if(question == 'multipleimage'){
                
            }
            if(question == 'etoile'){
                
            }
        });
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
</style>
