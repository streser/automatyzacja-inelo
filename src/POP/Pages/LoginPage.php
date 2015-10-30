<?php
include_once 'src/POP/Pages/ProductBacklogPage.php';
class LoginPage
{
	/**
	 * @var PHPUnit_Extensions_Selenium2TestCase
	 */
	private $driver;
	
	function __construct($driver) {
		$this->driver = $driver;
	}
	
	
	
	public function open()
	{
		return $this->driver->url('/');;
	}
	
	
	public function corectLogin()
	{
		$this->driver->byId('login')->value('admin');
		$this->driver->byId('password')->value('password');
		$this->driver->byClassName('button-small')->click();
		
		return new ProductBacklogPage($this->driver);
	}
		
}
	
