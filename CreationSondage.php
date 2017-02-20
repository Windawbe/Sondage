<?php
	require_once("index.php");
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
                                <i class="fa fa-3x fa-file-text" aria-hidden="true" style="color:white; "></i>
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
                                <form method="post" action="ConnexionUtilisateur.php">
                                    <div class="form-details">
                                        <label class="titre">
                                            <input type="text" name="titre" placeholder="Titre du sondage" id="titre" required>
                                        </label>
                                        <label class="intro">
                                            <input type="text" name="intro" placeholder="Texte d'introduction" id="titre" required>
                                        </label>
                                        <label class="choix_question">
                                            <div>
                                                <img class="brightness" src="Images/a.jpg" style="width:100px;height:100px;border:1px; border-style:solid;" />
                                                <img class="brightness" src="Images/b.jpg" style="width:100px;height:100px;border:1px; border-style:solid;">
                                            </div>
                                        </label>
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
    
<style>
    .brightness{
        border-radius:3px;
        color:#8492af;
    }
    .brightness:hover{
	opacity: .5;
        cursor:pointer;
}
</style>

<!--                                            
                                        </label>
                                    </div>
                                    <button type="submit" class="form-btn" onsubmit="">Envoyer</button>
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

<!--
<div class="wrapper container" style="margin-bottom:10px; margin-top:100px; background-color:white; border-radius: 10px;">
<div class="wrapper container" style="margin-bottom:10px; margin-top:20px;">
    <div class="col-xs-12 col-md-12 col-sm-12 col-lg-12">
        <button type='button' class=' btn-primary btn col-xs-12 col-md-12 col-sm-12 col-lg-12'>Créer un sondage</button>
    </div>
</div>

<div class="wrapper container" style="margin-bottom:10px;">
    <div class="col-xs-12 col-md-12 col-sm-12 col-lg-12">
        <button type='button' class='btn-primary btn col-xs-12 col-md-12 col-sm-12 col-lg-12'>Gérer ses sondages</button>
    </div>
</div>

<div class="wrapper container" style="margin-bottom:20px;">
    <div class="col-xs-12 col-md-12 col-sm-12 col-lg-12">
        <button type='button' class='btn-primary btn col-xs-12 col-md-12 col-sm-12 col-lg-12'>Analyser les résultats</button>
    </div>
</div>
</div> -->