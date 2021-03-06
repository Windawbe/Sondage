<?php

class Choix_utilisateur
{
    // <editor-fold desc="attributs">
    private static $table="choix_utilisateur";
    private $id, $id_reponse, $id_utilisateur, $temps;
    // </editor-fold>

    // <editor-fold desc="Constructeur">
    public function __construct($id=''){
        if ($id != '') {
            $this->setId($id);
            $this->load();
        }
    }
    // </editor-fold>

    // <editor-fold desc="Méthodes">
    public function load()
    {
        if (isset($this->id_reponse) && isset($this->id_utilisateur)) {

            $sql=("SELECT * FROM ".self::$table." WHERE id_reponse = ".$this->id_reponse." AND id_utilisateur =".$this->id_utilisateur);
            if ($result = Database::fetch($sql)) {
                $this->setTemps($result[0]['temps']);

                return true;
            }
        }
        return false;
    }

    public static function envoyerSondage($result, $temps)
    {
        $id_utilisateur = Utilisateur::getIDByPseudo();

        if($temps == null){
            $temps = 0;
        }

        $query="INSERT INTO ".self::$table." (id_reponse, id_utilisateur, temps)
          VALUES ('".$result."', '".$id_utilisateur."', '".$temps."')";

        Database::exec($query);
    }

    public static function getAnswer($id_reponse)
    {
        $query = "SELECT COUNT(*) FROM ".self::$table." WHERE id_reponse = ".$id_reponse;
        $result = (int)Database::fetchColumn($query);

        if($result != null) {
            return $result;
        }
        else{
            return 0;
        }
    }

    public static function getNbReponse($id_utilisateur, $list_id_reponse)
    {
        $chaineIdReponse = "";
        for($i = 0; $i < count($list_id_reponse); $i++){
            if($i +1 >= count($list_id_reponse)){
                $chaineIdReponse = ($chaineIdReponse . $list_id_reponse[$i]['id_reponse']);
            }
            else {
                $chaineIdReponse = ($chaineIdReponse . $list_id_reponse[$i]['id_reponse'] . ",");
            }
            //$lstIdQuestion[] = $id_question[$i]['id_question'];
        }

        $chaine = chop($chaineIdReponse, ",");

        $query = "SELECT COUNT(DISTINCT(id_utilisateur)) FROM ".self::$table." WHERE id_utilisateur = '".$id_utilisateur."' AND id_reponse IN(".$chaine.")";
        $result = (int)Database::fetchColumn($query);

        if($result != null) {
            return $result;
        }
        else{
            return 0;
        }
    }
    // </editor-fold>

    // <editor-fold desc="Setters">
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setTemps($temps)
    {
        $this->temps = $temps;
    }
    // </editor-fold>

    // <editor-fold desc="Getters">
    public function getTemps()
    {
        return $this->temps;
    }
    // </editor-fold>
}