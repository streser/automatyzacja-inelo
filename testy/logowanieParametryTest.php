<?php
class BananaScrumTest extends PHPUnit_Extensions_Selenium2TestCase {
	protected function setUp() {
		$this->setBrowser ( 'firefox' );
		$this->setBrowserUrl ( 'https://szkolenia.bananascrum.com' );
	}
	/**
	 * @test
	 * @dataProvider additionProvider
	 */
	public function shouldValidatLogin($login, $password)
	{
		$this->url ( '/' );
		
		$this->logintryLogIn ($login, $password);

		$this->assertEquals ( 'Login failed', $this->byId( 'flash' )->text () );
		
	}
	/**
	 * 
	 */
	private function logintryLogIn($login, $password) {
		$this->byId ( "login" )->value ( $login );
		$this->byId ( 'password' )->value ( $password );
		$this->byClassName ( 'button-small' )->click ();
	}

	
	public function additionProvider()
	{
		return array(
				array('admine','password'),
				array('admin', 'pasword'),
				array('', 'password'),
				array('', '')
		);
	}
	public function loginTest1() {
		$this->url ( '/' );
		
		$this->byId ( "login" )->value ( $login );
		$this->byId ( 'password' )->value ( $password );
		$this->byClassName ( 'button-small' )->click ();
		
		$this->assertEquals ( 'szkolenia', $this->byClassName ( 'domain-name' )->text () );
	}
	
	

}	