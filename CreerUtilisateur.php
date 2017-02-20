<?php
require_once("index.php");

if(isset($_SESSION['pseudo'])){ // Si utilisateur déjà connecté, envoie message erreur s'il essaye de se connecter à la page d'inscription
    require_once("erreur.php");
}
else{

    $login=$_POST['username'];
    $name=$_POST['name'];
    $firstname=$_POST['firstname'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $password=$_POST['password'];
    $pass_hache = sha1('gz' . $password);
    $confirm = sha1('gz' . $_POST['confirm']);
    $i = 0;
    $pseudo_erreur1 = NULL;
    $pseudo_erreur2 = NULL;
    $mdp_erreur = NULL;
    $email_erreur1 = NULL;
    $email_erreur2 = NULL;


    try{
        $db = new PDO('mysql:host=localhost;dbname=sondage', 'root', '');
        $db->exec("SET CHARACTER SET utf8"); 
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    }
    catch (Exception $e){
        die('Erreur : ' . $e->getMessage());
    }

    //Vérification du pseudo
    $query=$db->prepare('SELECT COUNT(*) AS nbr FROM utilisateur WHERE pseudo =:pseudo');
    $query->bindValue(':pseudo',$login, PDO::PARAM_STR);
    $query->execute();
    $pseudo_free=($query->fetchColumn()==0)?1:0;
    $query->CloseCursor();

    if(!$pseudo_free){
        $pseudo_erreur1 = "Votre pseudo est déjà utilisé par un membre";
        $i++;
    }

    if (strlen($login) > 20){
        $pseudo_erreur2 = "Votre pseudo est trop grand";
        $i++;
    }

    //Vérification du mdp
    if ($pass_hache != $confirm || empty($confirm) || empty($pass_hache)){
        $mdp_erreur = "Votre mot de passe et votre confirmation diffèrent, ou sont vides";
        $i++;
    }

    //Vérification de l'adresse email
    $query=$db->prepare('SELECT COUNT(*) AS nbr FROM utilisateur WHERE email =:mail');
    $query->bindValue(':mail',$email, PDO::PARAM_STR);
    $query->execute();
    $mail_free=($query->fetchColumn()==0)?1:0;
    $query->CloseCursor();

    if(!$mail_free){
        $email_erreur1 = "Votre adresse email est déjà utilisée par un membre";
        $i++;
    }

    //On vérifie la forme maintenant

    if (!preg_match("#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$#", $email) || empty($email)){
        $email_erreur2 = "Votre adresse E-Mail n'a pas un format valide";
        $i++;
    }

    // Si tout est OK
    if ($i==0){

        //On crée l'utilisateur

        $query=$db->prepare('INSERT INTO utilisateur (pseudo, mdp, email, nom, prenom, adresse) VALUES (:pseudo, :pass_hache, :email, :name, :firstname, :address)');

        $query->bindValue(':pseudo', $login, PDO::PARAM_STR);
        $query->bindValue(':pass_hache', $pass_hache, PDO::PARAM_INT);
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->bindValue(':name', $name, PDO::PARAM_STR);
        $query->bindValue(':firstname', $firstname, PDO::PARAM_STR);
        $query->bindValue(':address', $address, PDO::PARAM_STR);

        $query->execute();
        $query->CloseCursor();

        $_SESSION['pseudo'] = $login;

        echo '<br /><br /><br />Inscription réussie !';
        header("Refresh: 2; URL=./index.php");
    }
    else{
        echo '<br /><br /><br />';
        echo'<h1>Inscription interrompue</h1>';
        echo'<p>Une ou plusieurs erreurs se sont produites pendant l incription</p>';
        echo'<p>'.$i.' erreur(s)</p>';
        echo'<p>'.$pseudo_erreur1.'</p>';
        echo'<p>'.$pseudo_erreur2.'</p>';
        echo'<p>'.$mdp_erreur.'</p>';
        echo'<p>'.$email_erreur1.'</p>';
        echo'<p>'.$email_erreur2.'</p>';

        echo'<p>Cliquez <a href="./ConnexionForm.php">ici</a> pour recommencer</p>';
        header("Refresh: 2; URL=./index.php");

    }
}
?>