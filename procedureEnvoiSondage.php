<?php

require_once("./index.php");

if(!isset($_SESSION['pseudo'])){ // Si utilisateur non connecté
    require_once("./erreur.php");
}
else{


    if(isset($_GET['id'])) // faire vérif ici si le numéro est changé
    {
        // on recherche d'abord le sondage sur lequel on travaille
        $sondage = Sondage::GetSondageByID($_GET['id']);
        //on incrémente d'un le nombre de réponse
        Sondage::addReponse($_GET['id']);

        foreach($sondage AS $res => $rest)
        {
            $question = Question::GetQuestion($rest['id_sondage']);
            foreach($question as $ques => $quest)
            {
                $questionPost = "q" . $quest['id_question'];
                foreach($_POST[$questionPost] as $result)
                {
                    Choix_utilisateur::envoyerSondage($result, 0);
                }
            }
        }
    }
    else{
        require_once("./erreur.php");
    }
    header("Refresh: 1; URL=./dashboard.php");
}
?>