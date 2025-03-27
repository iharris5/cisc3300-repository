<?php

namespace App\Models;

use PDO;
use PDOException;

abstract class Model {
	public function findAll() {
		$query = "select * from $this->table";
		return $this->fetchAll($query);
	}

	private function connect() {
		$dsn = "mysql:hostname=" . DBHOST . ";dbname=" . DBNAME . ";";

		$options = [
            		//we can set the error mode, to throw exceptions or PDO type errors
            		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            		//set the default fetch type to associative array
            		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        	];

        	try {
            		return new PDO($dsn, DBUSER, DBPASS, $options);
        	} catch (PDOException $e) {
           	 	throw new PDOException($e->getMessage(), $e->getCode());
        	}

	}

	public function fetchAll($query) {
        	$connectedPDO = $this->connect();
        	$statementObject = $connectedPDO->query($query);
       	 	//no params, multiple rows
        	return $statementObject->fetchAll();
	}
}

