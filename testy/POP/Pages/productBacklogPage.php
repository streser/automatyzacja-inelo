<?php
class ProductBackLogPage {
	/**
	 * var PHPUnit_Extensions_Selenium2TestCase
	 * 
	 * @param unknown $driver        	
	 */
	private $driver;
	public function __construct($driver) {
		$this->driver = $driver;
	}
	public function isOpened() {
		if ($this->driver->byClassName ( "backlog-header-title" )->text () == 'Product backlog')
			return true;
		else
			return false;
	}
	public function addItem($randomString) {
		$this->driver->byClassName ( 'new-backlog-item' )->click ();
		sleep ( 3 );
		$this->driver->byId ( "item_user_story" )->value ($randomString);
		$this->driver->byId ( 'item_description' )->value ( 'description' );
		$this->driver->byClassName ( 'button-small' )->click ();
		
	}
	
	
	public function findItem($randomString)
	{
	//wait.until
	sleep ( 3 );
	$this->driver->assertEquals ( $randomString, $this->driver->byXPath( "//div[text()='$randomString']" )->text () );
// 	$this->driver->byXPath("//div[text()='$randomString']/div[3]/img[1]")->click();
	$itemElement = $this->driver->byXPath("//div[@class='item-top-content'][div[contains(text(),'$randomString')]]");
	$itemElement->byXPath(".//img[contains(@class, 'delete-item')]")->click();
	sleep(5);
	}
	
	
}
