<?php

include 'BeglogPage.php';

class LoginPage extends Page {
	
	/**
	 * 
	 * @var PHPUnit_Extensions_Selenium2TestCase $driver
	 */
	private $driver;

	function __construct($driver){
		$this->driver = $driver;
	}
	
	public function open(){
		$this->driver->url('/');
		return $this;
	}
	
	public function correctLogin(){

		$this->driver->byId('login')->value('admin');
		$this->driver->byId('password')->value('password');
		$this->driver->byClassName('button-small')->click();
		
		return new BeglogPage($this->driver);
	}
	
}