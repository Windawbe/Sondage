<?php
require_once("./index.php");

if(!isset($_SESSION['pseudo'])){ // Si utilisateur non connecté
    require_once("./erreur.php");
}
else{
    
//    require_once("./Classe/sondage.php");
//    require_once("./Classe/question.php");
//    require_once("./Classe/reponse.php");

    // <editor-fold desc="Récupération POST">
    $titre = "";
    $description = "";
    $dateDebut = "";
    $dateFin = "";
    $chronometrer = 0;
    $anonyme = 0;
    $verifDuplication = 0;
    $prevSpam = 0;
    $nQuestion = 0;
    $question = 0;
    $reponse = 0;
    $type = 0;

    if(isset($_POST["question"])){
        $question = $_POST["question"];
    }

    if(isset($_POST["reponse"])){
        $reponse = $_POST["reponse"];
    }

    if(isset($_POST["type"])) {
        $type = $_POST["type"];
    }

    if(isset($_POST["nQuestion"])){
        $nQuestion = $_POST["nQuestion"];
    }

    if(isset($_POST['titre'])){
        $titre = $_POST['titre'];
    }
    if(isset($_POST['introduction'])){
        $description = $_POST['introduction'];
    }
    if(isset($_POST['date'])){
        $dateDebut = substr($_POST['date'], 4, 7).'-'.substr($_POST['date'], 2, 2).'-'.substr($_POST['date'], 0, 2);
    }
    if(isset($_POST['date2'])){
        $dateFin = substr($_POST['date2'], 4, 7).'-'.substr($_POST['date2'], 2, 2).'-'.substr($_POST['date2'], 0, 2);
    }
    if(isset($_POST['chronometrer'])){
        $chronometrer = 1;
    }
    if(isset($_POST['anonyme'])){
        $anonyme = 1;
    }
    if(isset($_POST['verifDuplication'])){
        $verifDuplication = 1;
    }
    if(isset($_POST['prevSpam'])){
        $prevSpam = 1;
    }
    // </editor-fold>

    if($titre != "" && $description != "" && $dateDebut != "" && $dateFin != "") {

        // <editor-fold desc="Création du sondage">
        $id_utilisateur = Utilisateur::getIDByPseudo();

        Sondage::CreateSondage($titre, $description, $dateDebut, $dateFin, $id_utilisateur, $nQuestion,
            $verifDuplication, $prevSpam, $anonyme, $chronometrer);
        // </editor-fold>

        // <editor-fold desc="Création des questions et réponses">
        $id_sondage = Sondage::GetLastSondageIdByUser($id_utilisateur); // on récupère l'id du dernier sondage créé par l'utilisateur

        if ($question != 0) {
            foreach ($question AS $num => $QuestionValue) {
                // On crée une question

                Question::CreateQuestion($id_sondage, $QuestionValue['intro'], $reponse == 0 ? 0 : count($reponse[$num]) , $type[$num]);

                $id_question = Question::GetLastQuestionIDByUser($id_utilisateur);

                if ($reponse != 0) {
                    for ($i = 1; $i <= count($reponse[$num]); $i++) {
                        Reponse::CreateAnswer($id_question, $reponse[$num]['r' . $i], '');
                    }
                }
            }
        }
        // </editor-fold>
    }

    header("Refresh: 1; URL=./dashboard.php");
}
?>

