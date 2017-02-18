<?php
Class Reponse{
	
	public $id_reponse;
	public $id_question;
	public $reponse;
	public $lien_image;
	
	public function __construct($id_reponse, $id_question, $reponse, $lien_image)
    {
		try{
			$this->setId_reponse($id_reponse);
			$this->setId__question($id_question);
			$this->setReponse($reponse);
			$this->setLien_image($lien_image);
		}
		catch(Exception $e){
			die($e->getMessage());
		}
    }
	 
	// setters
	public function setId_reponse($id_reponse)
	{
		$this->id_reponse = $id_reponse;
	}
	 
	public function setId_question($id_question)
    {
        $this->id_question = $id_question;
    }
	
	public function setReponse($reponse)
    {
        $this->reponse = $reponse;
    }
	
	public function setLien_image($lien_image)
    {
        $this->lien_image = $lien_image;
    }
	 
	// getters
	public function getId_reponse()
	{
		return $this->id_reponse;
	}
	
	public function getId_question()
    {
		return $this->id_question;
    }
            
    public function getReponse()
    {
        return $this->reponse;
    }
            
    public function getLien_image()
    {
        return $this->lien_image;
    }
}

?>