<?php
Class Utilisateur{

    // <editor-fold desc="Attributs">
    private static $table="utilisateur";
    private $id_utilisateur, $pseudo, $mdp, $email, $nom, $prenom, $adresse;
    // </editor-fold>

    // <editor-fold desc="Constructeur">
    public function __construct($id_utilisateur =''){
         if ($id_utilisateur != '') {
             $this->setId($id_utilisateur);
             $this->load();
         }
     }
    // </editor-fold>

    // <editor-fold desc="Méthodes">
    public function load()
    {
        if (isset($this->id_utilisateur)) {

            $sql=("SELECT * FROM ".self::$table." WHERE id_utilisateur =".$this->id_utilisateur);
            if ($result = Database::fetch($sql)) {
                $this->setPseudo($result[0]['pseudo']);
                $this->setMdp($result[0]['mdp']);
                $this->setEmail($result[0]['email']);
                $this->setNom($result[0]['nom']);
                $this->setPrenom($result[0]['prenom']);
                $this->setAdresse($result[0]['adresse']);

                return true;
            }
            return false;
        }
    }
    
    public static function add($username, $name, $firstname, $email, $address, $password, $confirm)
    {
        $password_hash = sha1('gz' . $password);
        $confirm_hash = sha1('gz' . $confirm);
        $i = 0;
        $pseudo_erreur1 = NULL;
        $pseudo_erreur2 = NULL;
        $mdp_erreur = NULL;
        $email_erreur1 = NULL;
        $email_erreur2 = NULL;

        echo $username . " " . $name ." " .$firstname . " ". $email ." ". $address;

        // <editor-fold desc="Vérification du pseudo">
        $query='SELECT COUNT(*) AS nbr FROM '.self::$table.' WHERE pseudo ='.$username;
        Database::exec($query);
        $pseudo_free=(Database::fetch($query)==0)?0:1;

        //echo $pseudo_free;
        if(!$pseudo_free){
            $pseudo_erreur1 = "Votre pseudo est déjà utilisé par un membre";
            $i++;
        }

        if (strlen($username) > 20){
            $pseudo_erreur2 = "Votre pseudo est trop grand";
            $i++;
        }
        // </editor-fold>

        // <editor-fold desc="Vérification du mdp">
        if ($password_hash != $confirm_hash || empty($confirm_hash) || empty($password_hash)){
            $mdp_erreur = "Votre mot de passe et votre confirmation diffèrent, ou sont vides";
            $i++;
        }
        // </editor-fold>

        // <editor-fold desc="Vérification de l'adresse email">
        $query='SELECT COUNT(*) AS nbr FROM '.self::$table.' WHERE email ='.$email;
        Database::exec($query);
        $mail_free=(Database::fetch($query)==0)?0:1;

        if(!$mail_free){
            $email_erreur1 = "Votre adresse email est déjà utilisée par un membre";
            $i++;
        }

        //On vérifie la forme maintenant

        if (!preg_match("#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$#", $email) || empty($email)){
            $email_erreur2 = "Votre adresse E-Mail n'a pas un format valide";
            $i++;
        }
        // </editor-fold>

        // Si tout est OK
        if ($i==0){
            // <editor-fold desc="Création de l'utilisateur">
            $sql="INSERT INTO ".self::$table." VALUES (NULL, '".$username."','".$password_hash."','".$email."','".$name."','".$firstname."','".$address."');";
            //Database::exec($sql);

            $_SESSION['pseudo'] = $username;


            echo "<div class='wrapper container' style='margin-bottom:10px; margin-top:100px;'>".
                "<div class='alert alert-danger'>".
                "<h1>Inscription réussie</h1></div></div>";
            header("Refresh: 2; URL=./index.php");
            // </editor-fold>
        }
        else{
            // <editor-fold desc="Message d'erreur">
            echo "<div class='wrapper container' style='margin-bottom:10px; margin-top:100px;'>".
            "<div class='alert alert-danger'>".
            "<h1>Inscription interrompue</h1><p>Une ou plusieurs erreurs se sont produites pendant l'incription</p>".
            "<p>".$i." erreur(s)</p>".
            "<p>".$pseudo_erreur1."</p>".
            "<p>".$pseudo_erreur2."</p>".
            "<p>".$mdp_erreur."</p>".
            "<p>".$email_erreur1."</p>".
            "<p>".$email_erreur2."</p>".
            "<p>Cliquez <a href=./ConnexionForm.php>ici</a> pour recommencer</p>".
            "</div></div>";
            // </editor-fold>
        }
    }

    public static function connexion($login, $password)
    {
        $resultat = 0;
        $pass_hash = sha1('gz' .$password);

        // Vérification des identifiants
        if(!empty($pass_hash)){
            $query="SELECT pseudo FROM ".self::$table." WHERE pseudo = '".$login."' AND mdp = '".$pass_hash."'";

            Database::exec($query);
            $resultat = Database::fetch($query) == false ? 0 : 1;
        }

        if ($resultat == 0){
            echo "<div class='wrapper container' style='margin-bottom:10px; margin-top:100px;'>".
                "<div class='alert alert-danger'>".
                "<h1>Mauvais identifiant ou mot de passe</h1></div></div>";
            header("Refresh: 3; URL=./index.php");

        }
        else{
            $_SESSION['pseudo'] = $login;
            echo 'Vous êtes connecté !';

            // connexion automatique
            if (isset($_SESSION['pseudo'])){
                echo 'Bonjour ' . $_SESSION['pseudo'];
            }

            header("Refresh: 1; URL=./index.php");

            echo "<div class='wrapper container' style='margin-bottom:10px; margin-top:100px;'>".
                "<div class='alert alert-success'>".
                "<h1>Bienvenue ". $_SESSION['pseudo']." </h1></div></div>";
        }


    }

    public static function getIDByPseudo()
    {
        $query = "SELECT id_utilisateur FROM utilisateur WHERE pseudo ='".$_SESSION['pseudo']."'";
        Database::exec($query);
        $id = Database::fetchColumn($query);

        return $id;
    }
    // </editor-fold>

    // <editor-fold desc="Setters">
    public function setId($id_utilisateur)
    {
        $this->id_utilisateur = $id_utilisateur;
    }

	public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }
	
	public function setMdp($mdp)
    {
        $this->mdp = $mdp;
    }
	
	public function setEmail($email)
    {
        $this->email = $email;
    }
	
	public function setNom($nom)
    {
        $this->nom = $nom;
    }
	
	public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }
	
	public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }
    // </editor-fold>

    // <editor-fold desc="Getters">
	public function getID()
    {
        return $this->id_utilisateur;
    }
	
	public function getPseudo()
    {
        return $this->pseudo;
    }
	
	public function getMdp()
    {
        return $this->mdp;
    }
	
	public function getEmail()
    {
        return $this->email;
    }
	
	public function getNom()
    {
        return $this->nom;
    }
	
	public function getPrenom()
    {
        return $this->prenom;
    }
	
	public function getAdresse()
    {
        return $this->adresse;
    }
    // </editor-fold>
}

?>