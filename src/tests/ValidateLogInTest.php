<?php
class ValidateLogInTest extends PHPUnit_Extensions_Selenium2TestCase {
	protected function setUp() {
		$this->setBrowser('firefox');
		$this->setBrowserUrl('https://szkolenia.bananascrum.com/');
	}
	
	/**
	 * @test
	 */
	public function shouldLogIn() {
		$this->url('/');
		
		$this->tryLogIn ('admin', 'password');

		
		try {
			$result = $this->byLinkText('Logout')->displayed();
		} catch (Exception $e) {
			$this->fail('Nie uda³o siê zalogowaæ');
		}
		
		$this->assertTrue($result);
	}
	
	/**
	 * 
	 */
	 private function tryLogIn($user, $password) {
		$this->byId('login')->value($user);
		$this->byId('password')->value($password);
		
		$this->byName('commit')->click();
	}

	
	/**
	 * @dataProvider incorrectLoginPasswordProvider
	 * @test
	 */
	public function shouldNotLogIn($login, $pswd) {
		$this->url('/');
		$this->tryLogIn ($login, $pswd);
		
		try {
			$result = $this->byId('forgot-password')->displayed();
		} catch (Exception $e) {
			$this->fail('Uda³o siê zalogowaæ');
		}
	
		$this->assertTrue($result);
	}
	
	public function incorrectLoginPasswordProvider() {
		return array(
				array('admin', 'admin'),
				array('password', 'password'),
				array('test', 'test'),
				array('', 'password'),
				array('admin', ''),
				array('', '')
		);
	}
}