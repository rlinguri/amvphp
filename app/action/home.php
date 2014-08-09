<?php

/* Home
|  Custom Class-set for Default Page.
*/

/* Action Controller */
class HomeCtrl extends AMVActionCtrl
{

	public function __construct() {
		parent::__construct();
		$model = new HomeModel;
		$view = new HomeViewCtrl($model->getPageData());
		$view->page->printXml();
	}

}

/* View Controller */
class HomeViewCtrl extends AMVViewCtrl
{

	public $page;

	public function __construct($dta) {
		
		parent::__construct();
	
		$mta = new AMVView;
		$mta->setTag('meta');
		$mta->setAtr(array('name' => 'description','content' => $dta['dsc']));
		$mta->setScl(true);
		
		$ttl = new AMVView;
		$ttl->setTag('title');
		$ttl->setCnt($dta['ttl']);
		
		$css = new AMVView;
		$css->setTag('link');
		$css->setAtr(array('href' => ('css/'.$dta['css'].'.css') ,'rel' => 'stylesheet'));
		$css->setScl(true);

		$frm = new AMVView;
		$frm->setTag('div');
		$frm->setAtr(array('class' => 'jumbotron'));
		$frm->setCnt($dta['cnt']);

		$args = array(
			'hed' => array($mta,$ttl,$css),
			'bdy' => array($frm)
		);
		
		require_once('../app/view/page.php');
		$this->page = new PageViewCtrl($args);
		
	}

}

/* Model */
class HomeModel {
	
	private $pageData;

	/* initialize properties */
	public function __construct() {
				
		$this->pageData = array();
		
		$this->setPageData();
	
	}

	/* this method could access a CMS and return values from a database table */
	private function setPageData() {
		$this->pageData['ttl'] = STE_TTL.' : Home';
		$this->pageData['dsc'] = 'Default Home Page';
		$this->pageData['css'] = 'dashboard';
		$this->pageData['cnt'] = '<h1>Welcome to AMV</h1>
		<p class="lead">AMV is a fully object-oriented framework for developing PHP Applications.';
	}

	public function getPageData() {
	
		return $this->pageData;
		
	}
}
