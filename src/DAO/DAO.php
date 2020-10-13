<?php

namespace App\src\DAO;

use PDO;
use Exception;

/**
 * class DAO
 * @packages App\src\DAO
 * Classe servant à la connexion à la base de données
 */
abstract class DAO{


	private $connection;

	private function validationConnection(){
		if($this->connection===null){
			return $this->Connection();
		}
		return $this->connection;
	}

	private function connection(){
		try
		{
	    	$this->connection = new PDO(DB_host, DB_user, DB_password);
				$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    	return $this->connection;
		}
		catch(Exception $e)
		{
		    die('Erreur : '.$e->getMessage());
		}
	}

	protected function requete($sql, $parametre = null){
		if($parametre){
			$req = $this->validationConnection()->prepare($sql);
			$req->execute($parametre);
			return $req;
		}

		$req = $this->validationConnection()->query($sql);
    return $req;
	}

}
?>
