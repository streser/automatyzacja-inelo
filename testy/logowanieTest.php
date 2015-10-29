<?php
class BananaScrumTest extends PHPUnit_Extensions_Selenium2TestCase {
	protected function setUp() {
		$this->setBrowser ( 'firefox' );
		$this->setBrowserUrl ( 'https://szkolenia.bananascrum.com' );
	}
	
	/**
	 * @test
	 */
	public function loginTest() {
		$this->url ( '/' );
		
		$this->byId ( "login" )->value ( 'admin' );
		$this->byId ( 'password' )->value ( 'password' );
		$this->byClassName ( 'button-small' )->click ();
		
		$this->assertEquals ( 'szkolenia', $this->byClassName ( 'domain-name' )->text () );
	}
}	