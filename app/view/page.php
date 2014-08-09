<?php

/* Page
|  Customizable ViewController for an HTML page template
*/

class PageViewCtrl extends AMVViewCtrl
{

	/** PROPERTIES **/

	// public $domElmnts in parent class

	/** METHODS **/

	/**
	* @method: constructor
	* @descr:  starts the DOM with <!DOCTYPE html> and <html>
	* @param:  void
	* @return: void
	*/
	public function __construct($args) {
	
		parent::__construct();
		
		/* include Html View classes */
		require_once('../lib/dom/html.php');
		
		/* instantiate a doctype domElement */
		$doc = new DoctView;
		
		/* instantiate an html domElement */
		$htm = new HtmlView($args);
		
		/* send to public property to make available to other view controllers */		
		$this->domElmnts = array($doc,$htm);
		
	}

}

