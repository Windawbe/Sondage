<?php
Class Connexion{
	var $pdo;
	
	function __construct() {	
		try {
			$host = 'mysql:host=localhost;dbname=sondage';
			$login = root;//$_SESSION["Util"];
			$password = '';//$_SESSION["Password"];
			$this -> pdo = new PDO( $host, $login, $password );
			$this -> pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch (Exception $e){
			die ($e->getMessage());
		}		
	}
}

?>