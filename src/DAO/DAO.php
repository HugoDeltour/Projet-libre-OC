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

	private function checkConnection(){
		if($this->connection===null){
			return $this->getConnection();
		}
		return $this->connection;
	}

	private function getConnection(){
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

	protected function createQuery($sql, $parametre = null){
		if($parametre){
			$req = $this->checkConnection()->prepare($sql);
			$req->execute($parametre);
			return $req;
		}

		$req = $this->checkConnection()->query($sql);
    return $req;
	}

}
?>
