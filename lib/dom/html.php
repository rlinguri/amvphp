<?php

/* HTML DOM View Objects
|  Creates HTML to display DOM Elements
*/

class DoctView extends AMVView
{

	/** PROPERTIES **
	| public $tag // see parent class
	| public $atr
	| public $cnt
	| public $scl

	/** METHODS **/

	/* @param: void */
	public function __construct() {
	
		parent::__construct();
		
		$this->tag = '!DOCTYPE html';
		$this->scl = true;
	}

} // ./class DoctView

class HtmlView extends AMVView
{

	/** PROPERTIES **
	| public $tag
	| public $atr
	| public $cnt
	| public $scl

	/** METHODS **/

	/* @param: array of view objects */
	public function __construct($args) {
	
		parent::__construct();
		
		$hed = new HeadView($args['hed']);
		
		$bdy = new BodyView($args['bdy']);
		
		$this->tag = 'html';
		$this->atr = array('lang' => 'en');
		$this->scl = false;
		$this->cnt = array($hed,$bdy);
		
	}

} // ./class HtmlView

class HeadView extends AMVView
{

	/** PROPERTIES **
	| public $tag
	| public $atr
	| public $cnt
	| public $scl

	/** METHODS **/

	/* @param: array of head view objects */
	public function __construct($args) {
	
		parent::__construct();
		
		$this->tag = 'head';
		$this->scl = false;

		$mta_0 = new AMVView;
		$mta_0->setTag('meta');
		$mta_0->setAtr(array('charset' => 'utf-8'));
		$mta_0->setScl(true);
		$this->cnt[0] = $mta_0;
		
		$mta_1 = new AMVView;
		$mta_1->setTag('meta');
		$mta_1->setAtr(array('http-equiv' => 'X-UA-Compatible','content' => 'IE=edge'));
		$mta_1->setScl(true);
		$this->cnt[1] = $mta_1;
		
		$mta_2 = new AMVView;
		$mta_2->setTag('meta');
		$mta_2->setAtr(array('name' => 'viewport','content' => 'width=device-width, initial-scale=1'));
		$mta_2->setScl(true);
		$this->cnt[2] = $mta_2;
		
		$lnk_1 = new AMVView;
		$lnk_1->setTag('link');
		$lnk_1->setAtr(array('href' => 'css/bootstrap.min.css','rel' => 'stylesheet'));
		$lnk_1->setScl(true);
		$this->cnt[3] = $lnk_1;
		
		$lnk_2 = new AMVView;
		$lnk_2->setTag('link');
		$lnk_2->setAtr(array('href' => 'favicon.ico','rel' => 'shortcut icon'));
		$lnk_2->setScl(true);
		$this->cnt[4] = $lnk_2;
		
		// now add all of the passed in view objects
		$i = 5;
		foreach ($args as $view) {
		    $this->cnt[$i] = $view;
		    $i++;
		}
		
	}

} // ./class HeadView

class BodyView extends AMVView
{

	/** PROPERTIES **
	| public $tag
	| public $atr
	| public $cnt
	| public $scl

	/** METHODS **/

	/* @param: array of customized view objects passed from main view controller */
	public function __construct($args) {
	
		parent::__construct();
		
		$this->tag = 'body';
		$this->atr = array('role' => 'document');
		$this->scl = false;
		
		/* lgo will appear on every page */
		$lgo = new AMVView;
		$lgo->setTag('div');
		$lgo->setAtr(array('style' => 'text-align:center;'));
		$lgo->setCnt('<img src="img/logo.svg" width="128" height="128">');
		$this->cnt[0] = $lgo;
		
		// now add in passed in view objects
		$i  = 1;
		foreach ($args as $view) {
		    $this->cnt[$i] = $view;
		    $i++;
		}

		/* ftr will appear on every page */
		$ftr = new AMVView;
		$ftr->setTag('div');
		$ftr->setAtr(array('class' => 'footer'));
		$ftr->setScl(false);
		$ftr->setCnt('<div class="container"><p class="text-muted">&copy; 2014 Linguri Technology. Built with AMV PHP Framework.</p></div>');
		$this->cnt[$i] = $ftr;
	}

} // ./class BodyView

/* TODO: Add more pre-constructed dom elements */