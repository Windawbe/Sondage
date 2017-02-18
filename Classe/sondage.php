<?php
Class Sondage{
	
	public $id_sondage;
	public $titre;
	public $description;
	public $dateDebut;
	public $dateFin;
	public $id_utilisateur;
	public $nb_question;
	public $nb_verification;
	public $prevention_spam;
	public $anonyme;
	public $chronometrer;
	
	public function __construct($id_sondage, $titre, $description, $dateDebut, $dateFin, $id_utilisateur, $nb_question, $verification_duplication, 
		$prevention_spam, $anonyme, $chronometrer)
    {
		try{
			$this->setId_sondage($id_sondage);
			$this->setTitre($titre);
			$this->setDescription($description);
			$this->setDateDebut($dateDebut);
			$this->setDateFin($dateFin);
			$this->setId_utilisateur($id_utilisateur);
			$this->setNb_question($nb_question);   
			$this->setVerification_duplication($verification_duplication);    
			$this->setPrevention_spam($prevention_spam);   
			$this->setAnonyme($anonyme);   
			$this->setChronometrer($chronometrer);   
		}
		catch(Exception $e){
			die($e->getMessage());
		}
    }
	 
	// setters
	public function setId_sondage($id_sondage)
	{
		$this->id_sondage = $id_sondage;
	}
	 
	public function setTitre($titre)
    {
        $this->titre = $titre;
    }
	
	public function setDescription($description)
    {
        $this->description = $description;
    }
	
	public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;
    }
	
	public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;
    }
	
	public function setNb_question($nb_question)
    {
        $this->nb_question = $nb_question;
    }
	
	public function setVerification_duplication($verification_duplication)
    {
        $this->verification_duplication = $verification_duplication;
    }
	
	public function setPrevention_spam($prevention_spam)
    {
        $this->prevention_spam = $prevention_spam;
    }
	
	public function setAnonyme($anonyme)
    {
        $this->anonyme = $anonyme;
    }
	
	public function setChronometrer($chronometrer)
    {
        $this->chronometrer = $chronometrer;
    }
	 
	// getters
	public function getId_sondage()
	{
		return $this->id_sondage;
	}
	
	public function getTitre()
    {
		return $this->titre;
    }
            
    public function getDescription()
    {
        return $this->description;
    }
            
    public function getDatedebut()
    {
        return $this->dateDebut;
    }
            
    public function getDateFin()
    {
        return $this->dateFin;
    }
	
	public function getNb_question()
    {
        return $this->nb_question;
    }
	
	public function getVerification_duplication()
    {
        return $this->verification_duplication;
    }
	
	public function getPrevention_spam()
    {
        return $this->prevention_spam;
    }
	
	public function getAnonyme()
    {
        return $this->anonyme;
    }
	
	public function getChronometrer()
    {
        return $this->chronometrer;
    }
}

?>