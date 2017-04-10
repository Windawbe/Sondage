<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="fr" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <link rel="stylesheet" href="./font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./jquery/jquery-ui-1.12.1/jquery-ui.structure.min.css">
    <link rel="stylesheet" href="./jquery/jquery-ui-1.12.1/jquery-ui.min.css">
    <link rel="stylesheet" href="./jquery/jquery-ui-1.12.1/jquery-ui.theme.min.css">
    <link rel="stylesheet" href="./Bootstrap/css/bootstrap.min.css">
</head>

<?php
session_start();

require_once("./Classe/database.php");
require_once("./Classe/utilisateur.php");
require_once ("./Classe/sondage.php");
require_once ("./Classe/question.php");
require_once ("./Classe/reponse.php");
require_once("./Classe/choix_utilisateur.php");

$utilisateur = new utilisateur();
?>

<body background="Images/background3.jpg" style="background-repeat: no-repeat;
        background-attachment: fixed; overflow-x:hidden;">
<div id="menu">
    <nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: #0e1a35;">
        <div class="container">
            <ul class="nav navbar-nav">
                <a href="./index.php" class="logoS"><img src='./Images/logo.png' height="32" width="32" alt="logo" style="margin-top:10px;"/></a>
            </ul>
            <div class="navbar-header pull-right link">
                <?php
                if(!isset($_SESSION['pseudo'])){ // Si utilisateur non connecté
                    echo "<a class='navbar-brand' href='#'>Sondagea</a>";
                    echo "<a class='navbar-brand' href='./ConnexionForm.php'>Lancez-vous!</a>";
                }
                else{ // Si utilisateur connecté
                    echo "<a class='navbar-brand' href='./dashboard.php'>Sondagea</a>";
                    echo "<a class='navbar-brand' href='./deconnexion.php'>Deconnexion</a>";
                    echo "<a class='navbar-brand' href='#'>".$_SESSION['pseudo']."</a>";
                }
                ?>
            </div>
        </div>
    </nav>
</div>

<div id="page">

</div>

<script type="text/javascript" src="./Chart.js/Chart.bundle.min.js"></script>
<script type="text/javascript" src="./Chart.js/Chart.js"></script>
<script type="text/javascript" src="./JavaScript-Load-Image/js/load-image.all.min.js"></script>
<script type="text/javascript" src="./jquery/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="./jquery/jquery-ui-1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="./Bootstrap/js/bootstrap.min.js"></script>

</body>
</html>