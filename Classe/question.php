<?php
Class Question{
	
	public $id_question;
	public $id_sondage;
	public $question;
	public $nb_reponse;
	public $type;
	
	public function __construct($id_question, $id_sondage, $question, $nb_reponse, $type)
    {
		try{
			$this->setId_sondage($id_question);
			$this->setTitre($id_sondage);
			$this->setDescription($question);
			$this->setDateDebut($nb_reponse);
			$this->setDateFin($type);
		}
		catch(Exception $e){
			die($e->getMessage());
		}
    }
	 
	// setters
	public function setId_question($id_question)
	{
		$this->id_question = $id_question;
	}
	 
	public function setId_sondage($id_sondage)
    {
        $this->id_sondage = $id_sondage;
    }
	
	public function setQuestion($question)
    {
        $this->question = $question;
    }
	
	public function setNb_reponse($nb_reponse)
    {
        $this->nb_reponse = $nb_reponse;
    }
	
	public function setType($type)
    {
        $this->type = $type;
    }
	 
	// getters
	public function getId_question()
	{
		return $this->id_question;
	}
	
	public function getId_sondage()
    {
		return $this->id_sondage;
    }
            
    public function getQuestion()
    {
        return $this->question;
    }
            
    public function getNb_reponse()
    {
        return $this->nb_reponse;
    }
            
    public function getType()
    {
        return $this->type;
    }
}

?>