<?php
Class Sondage{

    // <editor-fold desc="Attributs">
    public $id_sondage;
	public $titre;
	public $description;
	public $dateDebut;
	public $dateFin;
	public $id_utilisateur;
	public $nb_question;
	public $verification_duplication;
	public $prevention_spam;
	public $anonyme;
	public $chronometrer;
    // </editor-fold>



    // <editor-fold desc="Constructeur">
//    public function __construct($id_sondage){
//        try{
//            $this->setIdSondage($id_sondage);
//        }
//        catch(Exception $e){
//            die($e->getMessage());
//        }
//    }

	public function __construct($titre, $description, $dateDebut, $dateFin, $id_utilisateur, $nb_question, $verification_duplication,
		$prevention_spam, $anonyme, $chronometrer)
    {
		try{
			$this->setTitre($titre);
			$this->setDescription($description);
			$this->setDateDebut($dateDebut);
			$this->setDateFin($dateFin);
			$this->setIdUtilisateur($id_utilisateur);
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
    // </editor-fold>

    // <editor-fold desc="Méthodes">
    public function CreateSondage(){

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

        $query=$db->prepare('INSERT INTO sondage (titre, description, dateDebut, dateFin, id_utilisateur,
          nb_question, verif_duplication, prevention_spam, anonyme, chronometrer)
          VALUES (:titre, :description, :dateDebut, :dateFin, :id_utilisateur, :nb_question, :verif_duplication, :prevention_spam, :anonyme, :chronometrer)');

        $query->bindValue(':titre', $this->titre, PDO::PARAM_STR);
        $query->bindValue(':description', $this->description, PDO::PARAM_STR);
        $query->bindValue(':dateDebut', $this->dateDebut, PDO::PARAM_STR);
        $query->bindValue(':dateFin', $this->dateFin, PDO::PARAM_STR);
        $query->bindValue(':id_utilisateur', $this->id_utilisateur, PDO::PARAM_INT);
        $query->bindValue(':nb_question', $this->nb_question, PDO::PARAM_INT);
        $query->bindValue(':verif_duplication', $this->verification_duplication, PDO::PARAM_BOOL);
        $query->bindValue(':prevention_spam', $this->prevention_spam, PDO::PARAM_BOOL);
        $query->bindValue(':anonyme', $this->anonyme, PDO::PARAM_BOOL);
        $query->bindValue(':chronometrer', $this->chronometrer, PDO::PARAM_BOOL);

        $query->execute();
    }
    // </editor-fold>

    // <editor-fold desc="setters">
    public function setIdSondage($id_sondage)
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

    public function setIdUtilisateur($id_utilisateur)
    {
        $this->id_utilisateur = $id_utilisateur;
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
    // </editor-fold">

    // <editor-fold desc="getters">
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
    // </editor-fold>
}

?>