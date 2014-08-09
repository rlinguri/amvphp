<?php

/* View Controller
|  Creates HTML for browser
*/

class AMVViewCtrl extends AMVObject
{

	/** PROPERTIES **/

	// an array of domElmnt objects
	public $domElmnts;
	
	/** METHODS **/

	/**
	* @method: constructor
	* @descr:  initialize domElmnts array
	* @param:  void
	* @return: void
	*/
	public function __construct() {
		parent::__construct();
		$this->domElmnts = array();
	}

	/**
	* @method: addDomElmnt
	* @descr:  adds an element to the end of the array
	* @param:  AMVView Object
	* @return: void
	*/
	public function addDomElmnt($domElmnt) {
		$i = count($domElmnt);
		$this->domElmnts[$i] = $domElmnt;
	}

	/**
	* @method: printXml
	* @descr:  outputs html string to the browser
	* @param:  void
	* @return: void
	*/
	public function printXml() {
		foreach ($this->domElmnts as $domElmnt) {
		    echo $domElmnt->getXml();
		}
	}

} // ./class AMVViewCtrl

/* Could also be called a DOM Element */
class AMVView extends AMVObject
{

	/** PROPERTIES **/

	/* the info to create this view object */
	public $tag; // string
	public $atr; // an array of attributes
	public $cnt; // can contain array of view objects or a string
	public $scl; // boolean
	
	/** METHODS **/

	/**
	* @method: constructor
	* @descr:  initialize object
	* @param:  void
	* @return: void
	*/
	public function __construct() {
		parent::__construct();
	}
	
	/* SETTERS */
	
	public function setTag($tag) {
		$this->tag = $tag;
	}

	public function setAtr($atr) {
		$this->atr = $atr;
	}

	public function setCnt($cnt) {
		$this->cnt = $cnt;
	}

	public function setScl($scl) {
		$this->scl = $scl;
	}

	/**
	* @method: getXml
	* @descr:  builds the XML/HTML/XHTML Markup
	* @param:  void
	* @return: void
	*/
	public function getXml() {
		
		$xml = '<'.$this->tag;
		if (isset($this->atr)) {
			foreach ($this->atr as $key=>$val) {
				$xml .= ' '.$key.'="'.$val.'"';
			} // ./foreach
		}

		$xml .= '>'.PHP_EOL;
		
		switch ($this->cnt) {
		    case is_string($this->cnt):
		        $xml .= $this->cnt;
		        break;
		    case is_array($this->cnt):
		        foreach ($this->cnt as $view) {
		            $xml .= $view->getXml();
		        }
		        break;
		    default:
		        $xml .= '';
		        break;
		}

		if (!$this->scl) {
			$xml .= PHP_EOL.'</'.$this->tag.'>'.PHP_EOL;
		} // ./if

		return $xml;

	} // ./getXml

} // ./class AMVView
