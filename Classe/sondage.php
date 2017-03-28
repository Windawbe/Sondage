<?php
Class Sondage{

    // <editor-fold desc="Attributs">
    private static $table="sondage";
    private $id_sondage, $titre, $description, $dateDebut, $dateFin, $id_utilisateur, $nb_question, $verification_duplication,
        $prevention_spam, $anonyme, $chronometrer;
    // </editor-fold>

    // <editor-fold desc="Constructeur">
    public function __construct($id_sondage =''){
        if ($id_sondage != '') {
            $this->setId_sondage($id_sondage);
            $this->load();
        }
    }
    // </editor-fold>

    // <editor-fold desc="Méthodes">
    public function load()
    {
        if (isset($this->id_question)) {

            $sql=("SELECT * FROM ".self::$table." WHERE id_sondage =".$this->id_sondage);
            if ($result = Database::fetch($sql)) {
                $this->setTitre($result[0]['titre']);
                $this->setDescription($result[0]['description']);
                $this->setDateDebut($result[0]['dateDebut']);
                $this->setDateFin($result[0]['dateFin']);
                $this->setIdUtilisateur($result[0]['id_utilisateur']);
                $this->setNb_question($result[0]['nb_question']);
                $this->setVerification_duplication($result[0]['verification_duplication']);
                $this->setPrevention_spam($result[0]['prevention_spam']);
                $this->setAnonyme($result[0]['anonyme']);
                $this->setChronometrer($result[0]['chronometrer']);

                return true;
            }
            return false;
        }
    }

    public static function CreateSondage($titre, $description, $dateDebut, $dateFin, $id_utilisateur, $nb_question, $verif_duplication, $prevention_spam, $anonyme, $chronometrer){

        $query="INSERT INTO sondage (titre, description, dateDebut, dateFin, id_utilisateur,
          nb_question, verif_duplication, prevention_spam, anonyme, chronometrer)
          VALUES ('".$titre."', '".$description."', '".$dateDebut."', '".$dateFin."', '".$id_utilisateur."', '".$nb_question."', '".$verif_duplication."', 
          '".$prevention_spam."', '".$anonyme."', '".$chronometrer."')";

        Database::exec($query);
    }

    public static function GetSondageByUserID($id){

        $query = 'SELECT * FROM sondage WHERE id_utilisateur ='.$id;
        Database::exec($query);

        $result = Database::fetch($query);

        return $result;
    }

    public static function GetLastSondageIdByUser($id){

        $query = 'SELECT id_sondage FROM sondage WHERE id_utilisateur ='.$id.' ORDER BY id_sondage DESC LIMIT 1';
        $result = Database::fetchColumn($query);

        return $result;
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