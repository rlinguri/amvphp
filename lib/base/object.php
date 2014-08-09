<?php

/* Object
|  The class from which all other classes are extended
*/

class AMVObject
{
	
	/** PROPERTIES **/

	// the four-letter class-set code
	public $pfx;
	
	// a place to store exceptions
	public $err;

	/** METHODS **/

	/**
	* @method: constructor
	* @descr:  sets default values common to all objects
	* @param:  void
	* @return: void
	*/
	public function __construct() {
		$this->pfx = strtolower(substr(get_class($this), 0, 4));
	}

}


