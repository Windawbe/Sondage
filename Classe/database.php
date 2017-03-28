<?php

class Database
{
    private static $host="localhost";
    private static $bdd="sondage";
    private static $user="root";
    private static $mdp="";
    private static $instance;
    private static $db;

    /* Constructeur priv� */
    private function __construct()
    {
    }

    public function __destruct()
    {
        self::$instance = null;
    }

    // Initialisation à la base de données
    static function initialisation(){
        try {
            self::$db = new PDO('mysql:host='.self::$host.';dbname='.self::$bdd, self::$user, self::$mdp);
            self::$db->exec("set names utf8");
        } catch (Exception $e) {
            echo 'Erreur connexion DB : ' . $e->getMessage() . '<br />';
            echo 'N" : ' . $e->getCode();
        }
    }

    /* Singleton (une seule et unique instance PDO pour tout le script) */
    static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::initialisation();
        }
        return self::$instance;
    }
    
    /* Requête de retour (tableau)*/
    static function fetch($sql)
    {
        self::getInstance();
        $state = self::$db->query($sql);
        if ($state)
            return $state->fetchAll(PDO::FETCH_ASSOC);
        else
            return false;
    }

    // Requête de retour (1 résultat)
    static function fetchColumn($sql)
    {
        self::getInstance();
        $state = self::$db->query($sql);
        if($state)
            return $state->fetchColumn();
        else
            return false;
    }

    /* Requête d'éxecution */
    static function exec($sql)
    {
        self::getInstance();
        return self::$db->exec($sql);
    }

    public function fetchClasse($sql, $class='')
    {
        $state = $this->db->query($sql);
        if ($state) return $state->fetchAll(PDO::FETCH_CLASS, $class);
        return false;
    }

    /* Dernière ID inseré */
    public function lastInsertId()
    {
        return $this->db->lastInsertId();
    }
}
