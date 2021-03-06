<?php
Class Reponse{

    // <editor-fold desc="Attributs">
    private static $table="reponse";
	public $id_reponse;
	public $id_question;
	public $reponse;
	public $lien_image;
    // </editor-fold>

    // <editor-fold desc="Constructeur">
    public function __construct($id_reponse =''){
        if ($id_reponse != '') {
            $this->setId_reponse($id_reponse);
            $this->load();
        }
    }
    // </editor-fold>

    // <editor-fold desc="Méthodes">
    public function load()
    {
        if (isset($this->id_reponse)) {

            $sql=("SELECT * FROM ".self::$table." WHERE id_reponse =".$this->id_reponse);
            if ($result = Database::fetch($sql)) {
                $this->setId_question($result[0]['$id_question']);
                $this->setReponse($result[0]['$reponse']);
                $this->setLien_image($result[0]['$lien_image']);

                return true;
            }
        }
        return false;
    }

    public static function CreateAnswer($id_question, $reponse, $lien_image)
    {
        $query="INSERT INTO ".self::$table."(id_question, reponse, lien_image)
          VALUES ('".$id_question."', '".$reponse."', '".$lien_image."')";

        Database::exec($query);
    }

    public static function GetAnswer($id_question)
    {
        $query = "SELECT * FROM ".self::$table." WHERE id_question =".$id_question;
        Database::exec($query);

        $result = Database::fetch($query);

        return $result;
    }

    public static function GetAllAnswer($id_question)
    {
        $chaineIdQuestion = "";
        for($i = 0; $i < count($id_question); $i++){
            if($i +1 >= count($id_question)){
                $chaineIdQuestion = ($chaineIdQuestion . $id_question[$i]['id_question']);
            }
            else {
                $chaineIdQuestion = ($chaineIdQuestion . $id_question[$i]['id_question'] . ",");
            }
            //$lstIdQuestion[] = $id_question[$i]['id_question'];
        }

        $chaine = chop($chaineIdQuestion, ",");
        //$chaineIdQuestion =

        $query = "SELECT id_reponse FROM ".self::$table." WHERE id_question IN(".$chaine.")";
        Database::exec($query);

        $result = Database::fetch($query);

        //var_dump($result);

        return $result;
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