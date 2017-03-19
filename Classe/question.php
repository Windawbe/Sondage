<?php
Class Question{

    // <editor-fold desc="attributs">
	public $id_question;
	public $id_sondage;
	public $description;
	public $nb_reponse;
	public $type;
    // </editor-fold>

    // <editor-fold desc="Constructeur">
	public function __construct($id_sondage, $description, $nb_reponse, $type)
    {
		try{
			$this->setId_sondage($id_sondage);
			$this->setDescription($description);
			$this->setNbReponse($nb_reponse);
			$this->setType($type);
		}
		catch(Exception $e){
			die($e->getMessage());
		}
    }
    // </editor-fold>

    // <editor-fold desc="Méthodes">
    public function CreateQuestion(){

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

        $query=$db->prepare('INSERT INTO question (id_sondage, description, nb_reponse, type)
          VALUES (:id_sondage, :description, :nb_reponse, :type)');

        $query->bindValue(':id_sondage', $this->id_sondage, PDO::PARAM_INT);
        $query->bindValue(':description', $this->description, PDO::PARAM_STR);
        $query->bindValue(':nb_reponse', $this->nb_reponse, PDO::PARAM_INT);
        $query->bindValue(':type', $this->type, PDO::PARAM_STR);

        $query->execute();
        //$query->CloseCursor();
    }
    // </editor-fold>

    // <editor-fold desc="setters">
	public function setId_question($id_question)
	{
		$this->id_question = $id_question;
	}

	public function setId_sondage($id_sondage)
    {
        $this->id_sondage = $id_sondage;
    }

	public function setDescription($description)
    {
        $this->description = $description;
    }
	
	public function setNbReponse($nb_reponse)
    {
        $this->nb_reponse = $nb_reponse;
    }
	
	public function setType($type)
    {
        $this->type = $type;
    }
    // </editor-fold>

    // <editor-fold desc="getters">
	public function getId_question()
	{
		return $this->id_question;
	}
	
	public function getId_sondage()
    {
		return $this->id_sondage;
    }
            
    public function getDescription()
    {
        return $this->description;
    }
            
    public function getNb_reponse()
    {
        return $this->nb_reponse;
    }
            
    public function getType()
    {
        return $this->type;
    }
    // </editor-fold>
}

?>