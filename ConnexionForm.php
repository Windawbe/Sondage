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
                                <i class="fa fa-3x fa-user-circle-o" aria-hidden="true" style="color:white; "></i>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="login-details">
                                <ul class="nav nav-tabs navbar-right">
                                    <li><a data-toggle="tab" href="#register">S'enregistrer</a></li>
                                    <li class="active"><a data-toggle="tab" href="#login">Se connecter</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    <div id="register" class="tab-pane">
                        <div class="login-inner">
                            <div class="title">
                                <h1>Créer<span> un compte maintenant!</span></h1>
                            </div>
                            <div class="login-form">
                                <form method="post" action="CreerUtilisateur.php">
                                    <div class="form-details">
                                        <label class="username">
                                            <input type="text" name="username" placeholder="Pseudo" id="username" required>
                                        </label>
                                        <label class="name">
                                            <input type="text" name="name" placeholder="Nom" id="name" required>
                                        </label>
                                        <label class="firstname">
                                            <input type="text" name="firstname" placeholder="Prenom" id="firstname" required>
                                        </label>
                                        <label class="mail">
                                            <input type="email" name="email" placeholder="Adresse Email" id="email" required>
                                        </label>
                                        <label class="pass">
                                            <input type="password" name="password" placeholder="Mot de passe" id="password" required>
                                        </label>
                                        <label class="pass">
                                            <input type="password" name="confirm" placeholder="Confirmer mot de passe" id="password" required>
                                        </label>
                                        <label class="address">
                                            <input type="text" name="address" placeholder="Adresse" id="address" required>
                                        </label>
                                    </div>
                                    <button type="submit" class="form-btn">Envoyer</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div id="login" class="tab-pane fade in active">
                        <div class="login-inner">
                            <div class="title">
                                <h1>Créez<span> vos propres sondages!</span></h1>
                            </div>
                            <div class="login-form">
                                <form method="post" action="ConnexionUtilisateur.php">
                                    <div class="form-details">
                                        <label class="user">
                                            <input type="text" name="username" placeholder="Utilisateur" id="username" required>
                                        </label>
                                        <label class="pass">
                                            <input type="password" name="password" placeholder="Mot de passe" id="password" required>
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