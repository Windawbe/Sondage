<?php
Class Reponse{

    // <editor-fold desc="Attributs">
	public $id_reponse;
	public $id_question;
	public $reponse;
	public $lien_image;
    // </editor-fold>

    // <editor-fold desc="Constructeur">
	public function __construct($id_question, $reponse, $lien_image)
    {
		try{
			$this->setId_question($id_question);
			$this->setReponse($reponse);
			$this->setLien_image($lien_image);
		}
		catch(Exception $e){
			die($e->getMessage());
		}
    }
    // </editor-fold>

    // <editor-fold desc="Méthodes">
    public function CreateAnswer(){

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

        $query=$db->prepare('INSERT INTO reponse (id_question, reponse, lien_image)
          VALUES (:id_question, :reponse, :lien_image)');

        $query->bindValue(':id_question', $this->id_question, PDO::PARAM_INT);
        $query->bindValue(':reponse', $this->reponse, PDO::PARAM_STR);
        $query->bindValue(':lien_image', $this->lien_image, PDO::PARAM_STR);

        $query->execute();
        //$query->CloseCursor();
    }
    // </editor-fold>

    // <editor-fold desc="setters">
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
    // </editor-fold>

    // <editor-fold desc="getters">
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
    // </editor-fold>
}

?>