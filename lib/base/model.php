<?php

/* Model Controller
|  Handles Database Functions
*/

/* Controller */
class AMVModelCtrl extends AMVObject
{

	/* each model controller stores its own connection */
	private $cxn;

	/* the model that this controller controls */
	public $model;

	/**
	* @method: constructor
	* @descr:  load connection and model
	* @param:  void
	* @return: void
	*/
	public function __construct() {
		parent::__construct();
		$dbs = AMVDatabase::dbs();
		$this->cxn = $dbs->cxn();
		$cls = ucwords($this->pfx);
		$this->model = new $cls.'Model';
	}

	public function ftc($sql) {
		$res = $this->cxn->query($sql);
		return $res->fetch(PDO::FETCH_ASSOC);
	}

	public function exe($sql) {
		return $this->cxn->exec($sql);
	}

}

/* Model */
class AMVModel extends AMVObject
{

	/**
	* @method: constructor
	* @descr:  instantiate object
	* @param:  void
	* @return: void
	*/
	public function __construct() {
		parent::__construct();
	}

}

/* @TODO AMVModelView - autoconstruct an HTML table to display database records */
