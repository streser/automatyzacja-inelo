<?php

include('src/POP/Pages/LoginPage.php');
//include('src/POP/Pages/BeglogPage.php');

class LoginTest extends PHPUnit_Extensions_Selenium2TestCase {

	
	public function setUp(){
		$this->setBrowser('firefox');
		$this->setBrowserUrl('https://szkolenia.bananascrum.com/');
	}
	
	/**
	 * @test
	 */
	public function shouldLogIn() {
	
		//given
		$loginPage = (new LoginPage($this))->open();
		
		//when
		$productBeglogPage = $loginPage->correctLogin();
		
		//then
		$this->assertTrue($productBeglogPage->isOpen($this));
	}
}