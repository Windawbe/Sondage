<?php
require_once("./index.php");

if(!isset($_SESSION['pseudo'])){ // Si utilisateur non connecté
    require_once("./erreur.php");
}
else {
    // VERIFIE QU'UN UTILISATEUR NE PEUT PAS ALLER SUR LE SONDAGE D'UN AUTRE UTILISATEUR
    $id_utilisateur = Utilisateur::getIDByPseudo();
    $verif_sondage = Sondage::GetSondageByUserID($id_utilisateur);

    $test_verif = NULL;

    foreach($verif_sondage as $ID => $idd){
        if($_GET['id_sondage'] == $idd['id_sondage']){
            $test_verif = 1;
        }
    }

    $chemin = "fichier.csv";

    if(isset($_GET['id_question']) && isset($test_verif)) {

        $question = Question::GetOneQuestion($_GET['id_question']);

        foreach($question AS $ques => $quest){

            $reponse = Reponse::GetAnswer($quest['id_question']);

            foreach($reponse AS $rep => $repon){
                $lignes[] = array($repon['reponse'], Choix_utilisateur::getAnswer($repon['id_reponse']));
            }
        }

        $delimiteur = ';'; // permet de sauter une cellule

        $fichier_csv = fopen($chemin, 'w+');

        fprintf($fichier_csv, chr(0xEF) . chr(0xBB) . chr(0xBF));

        foreach ($lignes as $ligne) {
            // chaque ligne en cours de lecture est insérée dans le fichier
            // les valeurs présentes dans chaque ligne seront séparées par $delimiteur
            fputcsv($fichier_csv, $ligne, $delimiteur);
        }

        header('Content-disposition: '.$chemin);
        header('Content-type: application/octetstream; filename='.$chemin);

        readfile($chemin);
		
        // fermeture du fichier csv
        fclose($fichier_csv);
		
		
		
    }

}
?>