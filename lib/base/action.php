<?php

/* Action
|  Processes HTTP Request.
*/

class AMVActionCtrl extends AMVObject
{

	/** PROPERTIES **/

	/** METHODS **/

	/**
	* @method: constructor
	* @descr:  create action controller
	* @param:  void
	* @return: void
	*/
	public function __construct() {
		parent::__construct();
		
		if (isset($_SESSION)) {
			foreach ($_SESSION as $key=>$val) {
				$this->$key = $val;
			}
		}
		
		foreach ($_GET as $key=>$val) {
		    $this->$key = $val;
		}
		
		foreach ($_POST as $key=>$val) {
		    $this->$key = $val;
		}
	}

}

/* store non-interactive parameters  */
class AMVAction extends AMVObject
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

/* you could store your actions in a database table */
class AMVActionModel extends AMVObject
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