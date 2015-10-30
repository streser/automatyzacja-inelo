<?php
include 'Page.php';
class BeglogPage extends Page {
	
	/**
	 *
	 * @var PHPUnit_Extensions_Selenium2TestCase 
	 */
	private $driver;
	private $itemText;

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
	
	private function findById($id){
		
		$elem = $this->driver->waitUntil($func = function ($arg) use ($id) {
			$elem = $this->driver->byId($id);
			return $elem;
		}
		,3000);
		
		return $elem;
		
	}
	
	private function findByXpath($id){
	
		$elem = $this->driver->waitUntil($func = function ($arg) use ($id) {
			$elem = $this->driver->byXPath($id)->text();
			return $elem;
		}
		,3000);
	
			return $elem;
	
	}
	
	
	public function addItem(){
		
		$this->driver->byClassName('new-backlog-item-button')->click();
			
		$this->findById('item_user_story')->value('udalo sie');
		
		$this->findById('item_description')->value('Description');
		
		$this->driver->byXPath("//div[@class='new-item-form-controls']/input")->click();
		
		$elem = $this->findByXpath("//div[contains(text(), 'udalo sie')]");
		

		//$this->driver->assertEquals('udalo sie', $elem);

		
		$this->itemText = $elem;
		
		
	}
	
	  
	 public function deleteItem() {
	 
		$element = $this->driver->waitUntil($func = function ($arg) {
			$element = $this->driver->byXPath("//div[div[contains(text(), 'udalo sie')]]/div[@class='controls']/img[@class='trash delete-item']");
			
			
			return $element;
		}
		,3000);
		
		
		$element->click();
		$this->driver->acceptAlert();
		$this->driver->assertEquals('udalo sie', $elem);
	}

	
	public function isItemAdded(){
		if($this->itemText = 'udalo sie'){
			return true;
		}
		else{
			return false;
		}
	}
	

}