<?php
include 'Page.php';
class BeglogPage extends Page {
	
	/**
	 *
	 * @var PHPUnit_Extensions_Selenium2TestCase 
	 */
	private $driver;

	function __construct($driver){
			$this->driver = $driver;
	}
	
	
	public function isOpen(){
		
		$resoult = $this->driver->byClassName('backlog-header-title')->text();
		
		
		if($resoult == 'Product backlog'){
			return true;
		}
		else{
			return false;
		}
		
	}

}