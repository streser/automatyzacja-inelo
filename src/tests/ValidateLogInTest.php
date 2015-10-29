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
		
		$this->byId('login')->value('admin');
		$this->byId('password')->value('password');
		
		$this->byName('commit')->click();
		
		$this->assertTrue($this->byLinkText('Logout')->displayed());
	}
}