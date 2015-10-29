<?php
class ProductBackLogPage {
	/**
	 *
	 * @var PHPUnit_Extensions_Selenium2TestCase
	 */
	private $driver;
	public function __construct($driver) {
		$this->driver = $driver;
	}
	public function isOpen(){
		return $this->driver->byName("project_id")->displayed();
	}
}