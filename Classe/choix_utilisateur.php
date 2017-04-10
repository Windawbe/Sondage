<?php

class Choix_utilisateur
{
    // <editor-fold desc="attributs">
    private static $table="choix_utilisateur";
    private $id_reponse, $id_utilisateur, $temps;
    // </editor-fold>

    // <editor-fold desc="Constructeur">
    public function __construct(){
            $this->load();
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
    // </editor-fold>

    // <editor-fold desc="Setters">
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