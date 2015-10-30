<?php
include_once('src/POP/Pages/ProductBacklogPage.php');
class LoginPage  {
	
	/**
	 * 
	 * @var PHPUnit_Extensions_Selenium2TestCase
	 */
	private $driver;
	
	public function __construct($driver) {
		$this->driver = $driver;
	}
	
	public function open() {
		$this->driver->url('/');
		return $this;
	}
	
	public function correctLogin() {
		$this->tryLogIn('admin', 'password');
		
		return new ProductBacklogPage($this->driver);
		
	}
	
	private function tryLogIn($user, $password) {
		$this->driver->byId('login')->value($user);
		$this->driver->byId('password')->value($password);
	
		$this->driver->byName('commit')->click();
	}
}
