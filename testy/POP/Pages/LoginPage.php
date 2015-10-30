<?php
include_once ('testy/POP/Pages/productBackLogPage.php');
class LoginPage {
	
	/**
	 * var PHPUnit_Extensions_Selenium2TestCase
	 * @param unknown $driver
	 */
	private $driver;
	
	public function __construct($driver) {
		$this->driver = $driver;
	}
	public function open() {
	
		$this->driver->url ( '/' );
		return $this;
	}
	
	/*public function openLoginPage() {
		$this->setBrowser ( 'firefox' );
		$this->setBrowserUrl ( 'https://szkolenia.bananascrum.com' );
		$this->url ( '/' );
		$this->assertEquals ( 'Log in', $this->byClass ( 'button-small' )->text () );
		
	} */
	

	public function correctLogin() {
		
		$this->driver->byId ( "login" )->value ( 'admin' );
		$this->driver->byId ( 'password' )->value ( 'password' );
		$this->driver->byClassName ( 'button-small' )->click ();
		return new ProductBackLogPage($this->driver);
	}

}	
