<?php
require_once("./index.php");
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
                                        <center><span>Mon sondage</span></center>
                                    </div>
                                    <div class="login-form">
                                        <form method="post" action="Parametrage.php">
                                            <div class="form-details">
                                                <label class="titre">
                                                    <input type="text" name="titre" placeholder="Titre du sondage" id="titre" required>
                                                </label>
                                                <label class="intro">
                                                    <input type="text" name="intro" placeholder="Texte d'introduction" id="titre" required>
                                                </label>
                                                <!-- Ajout d'une nouvelle question -->
                                                <div class="addQuestion" style="color:#b0c900;">
                                                    <i class="fa fa-plus-circle" aria-hidden="true" style="font-size:50px; font-weight: 300;"></i>
                                                </div>
                                                <div class="row" style="margin-left:30px; text-align:left; color:#a9abae; font-size:16px; font-weight: 300;">Questions</div>
                                                
                                                <div class='row' style="border:1px; border-color:#8492af; border-style:solid; border-radius:2px; margin-right:20px; margin-left:20px;">
                                                    <div>1<input type="text" name="intro" placeholder="Écrivez le texte de votre question..." id="titre" required></div>
                                                    <!-- Reponse 1-->
                                                      <div class="row reponse">
                                                          <div class="col-md-2 col-sm-2 col-xs-2 col-md-offset-1">
                                                              <input type="radio" class="btnradio" name="gender" disabled style="cursor:default; text-align:left;" />
                                                          </div>
                                                          <div class="col-md-6 col-sm-6 col-xs-6">
                                                              <input type="text" class="reponse" placeholder="Réponse 1" />
                                                          </div>
                                                          <div class="col-md-1 col-sm-1 col-xs-1">
                                                              <i class="fa fa-trash fa-1x deleterep" aria-hidden="true"></i> 
                                                          </div>
                                                      </div>
                                                    <!-- Reponse 2-->
                                                      <div class="row reponse">
                                                          <div class="col-md-2 col-sm-2 col-xs-2 col-md-offset-1">
                                                              <input type="radio" class="btnradio" name="gender" disabled style="cursor:default; text-align:left;" />
                                                          </div>
                                                          <div class="col-md-6 col-sm-6 col-xs-6">
                                                              <input type="text" class="reponse" placeholder="Réponse 2" />
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
                                                      

                                                    <div class="test"></div>
                                                </div>
<!--
                                                <div class='row' style="border:1px; border-color:#8492af; border-style:solid; border-radius:2px; margin-right:20px; margin-left:20px;">
                                                    <div><input type="text" name="intro" placeholder="Titre de la question" id="titre" required></div>
                                                    <div class="AllChoices">
                                                        <img class="brightness choixunique" id="choixunique" src="Images/a.jpg" />
                                                        <img class="brightness" id="choixmultiple" src="Images/b.jpg" />
                                                        <img class="brightness" id="reponsetextuelle" src="Images/c.jpg" />
                                                        <img class="brightness" id="choixuniqueimage" src="Images/d.jpg" />
                                                        <img class="brightness" id="choixmultipleimage" src="Images/e.jpg" />
                                                        <img class="brightness" id="choixetoile" src="Images/f.jpg" />
                                                    </div>

                                                    <div class="test"></div>
                                                </div>
-->
                                                <br />
                                                <div class="newchoice"></div>
                                                
                                                <!-- Ajout d'une nouvelle question -->
                                                <div class="addQuestion" style="color:#b0c900;">
                                                    <i class="fa fa-plus-circle" aria-hidden="true" style="font-size:50px; font-weight: 300;"></i>
                                                </div>
                                                
                                                <br /><br />
                                                <button type="submit" class="form-btn" onsubmit="">Créer</button>
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

<script>
    $(document).ready(function() {

        //creer nouvelle question
        $(".addQuestion").click(function(){
            $( ".newchoice" ).append("<div class='row' style='border:1px; border-color:#8492af; border-style:solid; border-radius:2px; margin-right:20px; margin-left:20px;'><input type='text' name='intro' placeholder='Titre de la question' id='titre' required></div><div class='AllChoices'><img class='brightness choixunique' src='Images/a.jpg' /><img class='brightness' id='choixmultiple' src='Images/b.jpg' /><img class='brightness' id='reponsetextuelle' src='Images/c.jpg' /><img class='brightness' id='choixuniqueimage' src='Images/d.jpg' /><img class='brightness' id='choixmultipleimage' src='Images/e.jpg' /><img class='brightness' id='choixetoile' src='Images/f.jpg' /></div><div class='test'></div></div>");
        });
        
        // Sélection choix unique
        $(".choixunique").click(function(){
//            $( ".test" ).append("<br /><div class='row'><div class='col-xs-1'><input type='radio' name='reason' value='' /></div><div class='col-xs-10'><input type='text' name='text'><div class='col-xs-1'><i class='fa fa-trash' aria-hidden="true"></i></div></div><div class='row'><div class='col-xs-1'><input type='radio' name='reason' value='' /></div><div class='col-xs-10'><input type='text' name='text'></div><div class='col-xs-1'><i class='fa fa-trash' aria-hidden="true"></i></div><br />");
            $( ".test" ).append("<div class='row'><input type='text' name='intro' placeholder='choix 1' id='titre' required /><i class='fa  fa-plus'id='testtt' aria-hidden='true'></i><i class='fa fa-trash' aria-hidden='true'></i></div>");

            //$( ".test" ).parent().hide();
            $(".AllChoices").hide();
        });

        // Sélection choix multiple
        $("#choixmultiple").click(function(){
            $( ".test" ).append("<div class='question'><div class='checkbox'><input type='checkbox' value=''>Option 1</div><div class='checkbox'><input type='checkbox' value=''>Option 2</div></div>");
            
            $(".AllChoices").hide();
        });

        // Sélection réponse textuelle
        $("#reponsetextuelle").click(function(){
            
            $(".AllChoices").hide();
        });

        // Sélection choix image unique
        $("#choixuniqueimage").click(function(){
            
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
//            $("#titre").hide();
        });
        
        $(".deleterep").click(function(){
           var x = $(this).parent();
            x = x.parent();
            x.remove();
        });
        
        $(".addNewReponse").click(function(){
            
            $(".rep").append("<div class='row'><div class='col-md-2 col-sm-2 col-xs-2 col-md-offset-1'><input type='radio' class='btnradio' name='gender' disabled style='cursor:default; text-align:left;' /></div><div class='col-md-6 col-sm-6 col-xs-6'><input type='text' class='reponse' placeholder='Réponse 3' /></div><div class='col-md-1 col-sm-1 col-xs-1'><i class='fa fa-trash fa-1x deleterep' aria-hidden='true'></i></div></div>");
        });
    });
</script>


<style>    
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
</style>
