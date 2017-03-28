<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="fr" xmlns="http://www.w3.org/1999/xhtml">
<!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384 BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">-->
<!--    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->


<link rel="stylesheet" href="./font-awesome-4.7.0/css/font-awesome.min.css">
<script type="text/javascript" src="./JavaScript-Load-Image/js/load-image.all.min.js"></script>

<link rel="stylesheet" href="./style.css">

<script type="text/javascript" src="./jquery/jquery-3.1.1.min.js"></script>
<link rel="stylesheet" href="./jquery/jquery-ui-1.12.1/jquery-ui.structure.min.css">
<link rel="stylesheet" href="./jquery/jquery-ui-1.12.1/jquery-ui.min.css">
<script type="text/javascript" src="./jquery/jquery-ui-1.12.1/jquery-ui.min.js"></script>
<link rel="stylesheet" href="./jquery/jquery-ui-1.12.1/jquery-ui.theme.min.css">
<link rel="stylesheet" href="./Bootstrap/css/bootstrap.min.css">
<script type="text/javascript" src="./Bootstrap/js/bootstrap.min.js"></script>

<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>

<?php
session_start();
require_once("./Classe/database.php");
require_once("./Classe/utilisateur.php");
$utilisateur = new utilisateur();

require_once("header.php");
?>

<body background="Images/background3.jpg" style="background-repeat: no-repeat;
    background-attachment: fixed;">


</body>

</html>

<style>
    .logoS:hover{
        opacity: 0.5;
        cursor:pointer;
    }
</style>