<?php
require_once("./index.php");

if(!isset($_SESSION['pseudo'])){ // Si utilisateur non connecté
    require_once("./erreur.php");
}
else{
    
    require_once("./Classe/sondage.php");

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

    $d = $_POST['date'];
    //echo '<script>alert('.$d.')</script>';
    //echo $d;

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

    $question = $_POST["question"];
    $reponse = $_POST["reponse"];
    $type = $_POST["type"];

    foreach($question AS $num => $QuestionValue){
        echo "<br><br><br>question $num = {$QuestionValue['intro']}<br>"; // on stocke la question
        echo "type de question : ".$type[$num]."<br>";

        for($i = 1; $i <= count($reponse[$num]); $i++){
            echo "---réponse $i = {$reponse[$num]['r'.$i]}<br>";
        }
    }

    // <editor-fold desc="Connexion BDD">
    try{
        $db = new PDO('mysql:host=localhost;dbname=sondage', 'root', '');
        $db->exec("SET CHARACTER SET utf8"); 
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    }
    catch (Exception $e){
        die('Erreur : ' . $e->getMessage());
    }
    // </editor-fold>

    // <editor-fold desc="Création du sondage">
    $query = $db->prepare('SELECT id_utilisateur FROM utilisateur WHERE pseudo =:pseudo');
    $query->bindValue(':pseudo',$_SESSION['pseudo'], PDO::PARAM_STR);
    $query->execute();
    $id_utilisateur = $query->fetchColumn();

    $form = new Sondage($titre, $description, $dateDebut, $dateFin, $id_utilisateur, $nQuestion,
        $verifDuplication, $prevSpam, $anonyme, $chronometrer);

    //$form->CreateSondage();
    // </editor-fold>

    // <editor-fold desc="Questions et réponses">
    for($i = 0; $i < $nQuestion; $i++){

    }

    // </editor-fold>

//    echo '<script>alert('.$id_utilisateur.')</script>';
    //echo '<script>alert('.$result.')</script>';
    //echo '<script>alert("'.date('d-m-Y H:i:s').'")</script>';
    
}
?>

