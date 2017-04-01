<?php
require_once("./index.php");

require_once ("./Classe/sondage.php");
require_once ("./Classe/question.php");
require_once ("./Classe/reponse.php");

if(!isset($_SESSION['pseudo'])){ // Si utilisateur non connecté
    require_once("./erreur.php");
}
else {
    if(isset($_GET['id'])) {
        $sondage = Sondage::GetSondageByID($_GET['id']); // Récupération des sondages

        foreach($sondage as $s => $survey){
            $question = Question::GetQuestion($survey['id_sondage']);

            echo $survey['titre'];
            echo $survey['description'];

            foreach($question as $q => $quest){
                $reponse = Reponse::GetAnswer($quest['id_question']);
                echo $quest['description'];
                echo $quest['type'];

            }

        }


    }
}