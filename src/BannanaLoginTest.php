<?php
class BannanaScrumTest extends PHPUnit_Extensions_Selenium2TestCase
{
	protected function setUp()
	{
		$this->setBrowser('firefox');
		$this->setBrowserUrl('https://szkolenia.bananascrum.com');
	}

	/**
	 * @test
	 */
	public function shouldLogIn()
	{
		$this->tryLogIn ('admin','password');

		$this->assertEquals('szkolenia', $this->byClassName('domain-name')->text());
	}
	/**
	 * 
	 */private function tryLogIn($login, $password) {
		$this->url('/');
		$this->byId('login')->value($login);
		$this->byId('password')->value($password);
		$this->byClassName('button-small')->click();
	}

	
	/**
	 * @dataProvider IncorrectLoginProvider()
	 * @test
	 */
	public function shoudNotLogin($login, $password)
	{
		//given
		
		//when
		$this->tryLogIn($login,$password);
		//then
		$this->assertEquals('Login failed', $this->byClassName('flash')->text());
	}
	
	public function IncorrectLoginProvider()
	{
		return array(
				'Incorrect password' => array("admin","asd"),
				'Incorrect login' => array("asd","password"),
				'Incorrect password and login' => array("asd","asd"),
				'Incorrect empty password and login' => array("","")
		);
	}

}