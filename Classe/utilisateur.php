<?php
Class Utilisateur{

    // <editor-fold desc="Attributs">
	public $id_utilisateur;
	public $pseudo;
	public $mdp;
	public $email;
	public $nom;
	public $prenom;
	public $adresse;
    // </editor-fold>

    // <editor-fold desc="Constructeur">
	public function __construct($pseudo, $mdp, $email, $nom, $prenom, $adresse)
    {
		try{
			$this->setPseudo($pseudo);
			$this->setMdp($mdp);
			$this->setEmail($email);
			$this->setNom($nom);
			$this->setPrenom($prenom);
			$this->setAdresse($adresse);    
		}
		catch(Exception $e){
			die($e->getMessage());
		}
    }
    // </editor-fold>

    // <editor-fold desc="Setters">
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

    // <editor-fold desc="Méthodes">
    public function supprimerSondage($id_sondage)
    {
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

        $query = $db->prepare('DELETE FROM sondage WHERE id_sondage =:sondage');
        $query->bindValue(':sondage',$id_sondage, PDO::PARAM_INT);
        $query->execute();
    }
    // </editor-fold>
}

?>