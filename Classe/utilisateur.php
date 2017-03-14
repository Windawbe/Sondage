<?php
Class Utilisateur{
	
	public $id_utilisateur;
	public $pseudo;
	public $mdp;
	public $email;
	public $nom;
	public $prenom;
	public $adresse;
	
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
	
	// setters
	
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
	
	// Getters
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
}

?>