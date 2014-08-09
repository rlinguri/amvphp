<?php

/* Database
|  Not extended from any other classes, because this essentially a PDO object.
*/

class AMVDatabase
{
	
	/** PROPERTIES **/

	// the database singleton
	private static $dbs;

	// the database connection
	private $cxn;
	
	// the error message
	public $err;

	/** METHODS **/

	/**
	* @method: constructor
	* @descr:  create database singleton
	* @param:  void
	* @return: void
	*/
	public function __construct() {
			try {
			$this->cxn = new PDO('mysql:host='.LCL_HST.';dbname='.LCL_DBS,LCL_USN,LCL_PSW);
		} catch (Exception $e) {
			$this->err = $e->getMessage();
			return $this->err;
		}
	}

	/**
	* @method: database
	* @descr:  returns database
	* @param:  void
	* @return: PDO object
	*/
	public static function dbs() {
		if (!self::$dbs) {
			self::$dbs = new self();
		}
		return self::$dbs;
	}
	
	/**
	* @method: clone
	* @descr:  prevents duplication
	* @param:  void
	* @return: void
	*/
	private function __clone() { }
	
	/**
	* @method: connection
	* @descr:  returns connection
	* @param:  void
	* @return: php database object(pdo);
	*/
	public function cxn() {
		return $this->cxn;
	}

}

