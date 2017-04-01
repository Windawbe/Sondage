<?php
require_once("./index.php");

if(!isset($_SESSION['pseudo'])){ // Si utilisateur non connecté
    require_once("./erreur.php");
}
else{

    require_once("./Classe/sondage.php");
    require_once("./Classe/question.php");
    require_once("./Classe/reponse.php");

    // VERIFIE QU'UN UTILISATEUR NE PEUT PAS ALLER MODIFIER LE SONDAGE D'UN AUTRE UTILISATEUR
    $id_utilisateur = Utilisateur::getIDByPseudo();
    $verif_sondage = Sondage::GetSondageByUserID($id_utilisateur);

    $test_verif = NULL;

    foreach($verif_sondage as $ID => $idd){
        if($_GET['id'] == $idd['id_sondage']){
            $test_verif = 1;
        }
    }
    if(isset($_GET['id']) && isset($test_verif)) {
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

        if (isset($_POST["question"])) {
            $question = $_POST["question"];
        }

        if (isset($_POST["reponse"])) {
            $reponse = $_POST["reponse"];
        }

        if (isset($_POST["type"])) {
            $type = $_POST["type"];
        }

        if (isset($_POST["nQuestion"])) {
            $nQuestion = $_POST["nQuestion"];
        }

        if (isset($_POST['titre'])) {
            $titre = $_POST['titre'];
        }
        if (isset($_POST['introduction'])) {
            $description = $_POST['introduction'];
        }
        if (isset($_POST['date'])) {
            $dateDebut = substr($_POST['date'], 4, 7) . '-' . substr($_POST['date'], 2, 2) . '-' . substr($_POST['date'], 0, 2);
        }
        if (isset($_POST['date2'])) {
            $dateFin = substr($_POST['date2'], 4, 7) . '-' . substr($_POST['date2'], 2, 2) . '-' . substr($_POST['date2'], 0, 2);
        }
        if (isset($_POST['chronometrer'])) {
            $chronometrer = 1;
        }
        if (isset($_POST['anonyme'])) {
            $anonyme = 1;
        }
        if (isset($_POST['verifDuplication'])) {
            $verifDuplication = 1;
        }
        if (isset($_POST['prevSpam'])) {
            $prevSpam = 1;
        }
        // </editor-fold>

        if ($titre != "" && $description != "" && $dateDebut != "" && $dateFin != "") {

            // <editor-fold desc="Création du sondage">
            $id_utilisateur = Utilisateur::getIDByPseudo();

            Sondage::UpdateSondage($_GET['id'], $titre, $description, $dateDebut, $dateFin, $nQuestion,
                $verifDuplication, $prevSpam, $anonyme, $chronometrer);
            // </editor-fold>

            // Suppression des questions et des réponses avant création des nouvelles questions réponses
            Question::DeleteQuestion($_GET['id']);

            // <editor-fold desc="Création des questions et réponses">

            if ($question != 0) {
                foreach ($question AS $num => $QuestionValue) {
                    // On crée une question

                    Question::CreateQuestion($_GET['id'], $QuestionValue['intro'], count($reponse[$num]), $type[$num]);

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
    else{
        require_once("./erreur.php");
    }
}
?>

