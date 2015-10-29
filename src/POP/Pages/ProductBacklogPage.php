<?php
class ProductBacklogPage  {
	/**
	 *
	 * @var PHPUnit_Extensions_Selenium2TestCase
	 */
	private $driver;
	
	public function __construct($driver) {
		$this->driver = $driver;
	}
	
	public function isOpened() {		
		return $this->driver->byLinkText('Logout')->displayed();		
	}
}