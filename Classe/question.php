<?php
Class Question{

    // <editor-fold desc="attributs">
    private static $table="question";
    private $id_question, $id_sondage, $description, $nb_reponse, $type;
    // </editor-fold>

    // <editor-fold desc="Constructeur">
    public function __construct($id_question =''){
        if ($id_question != '') {
            $this->setId_question($id_question);
            $this->load();
        }
    }
    // </editor-fold>

    // <editor-fold desc="Méthodes">
    public function load()
    {
        if (isset($this->id_question)) {

            $sql=("SELECT * FROM ".self::$table." WHERE id_question =".$this->id_question);
            if ($result = Database::fetch($sql)) {
                $this->setDescription($result[0]['description']);
                $this->setNbReponse($result[0]['nb_reponse']);
                $this->setType($result[0]['type']);

                return true;
            }
        }
        return false;
    }

    public static function CreateQuestion($id_sondage, $description, $nb_reponse, $type){

        $query="INSERT INTO ".self::$table." (id_sondage, description, nb_reponse, type)
          VALUES ('".$id_sondage."', '".$description."', '".$nb_reponse."', '".$type."')";

        Database::exec($query);
    }

    public static function GetLastQuestionIDByUser($id)
    {
        $query = "SELECT id_question FROM ".self::$table." INNER JOIN sondage ON question.id_sondage = sondage.id_sondage WHERE sondage.id_utilisateur =".$id." ORDER BY id_question DESC LIMIT 1";
        $result = Database::fetchColumn($query);

        return $result;
    }

    public static function GetQuestion($id_sondage)
    {
        $query = "SELECT * FROM ".self::$table." WHERE id_sondage =".$id_sondage;
        Database::exec($query);

        $result = Database::fetch($query);

        return $result;
    }

    public static function GetOneQuestion($id_question)
    {
        $query = "SELECT * FROM ".self::$table." WHERE id_question =".$id_question;
        Database::exec($query);

        $result = Database::fetch($query);

        return $result;
    }

    public static function DeleteQuestion($id_sondage)
    {
        $query = "DELETE FROM ".self::$table." WHERE id_sondage =".$id_sondage;
        Database::exec($query);
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