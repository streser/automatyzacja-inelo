<?php
include_once ('testy/POP/Pages/LoginPage.php');

class BananaLogInTest extends PHPUnit_Extensions_Selenium2TestCase
{
	public function setUp() {
		$this->setBrowser ( 'firefox' );
		$this->setBrowserUrl ( 'https://szkolenia.bananascrum.com' );
	}
	
	/**
	 * @test
	 */
	public function bananaTryLogInTest() {
		//given
		$loginPage=new LoginPage($this);
		$loginPage->open();
		
		//when
		
		$productBacklogPage=$loginPage->correctLogin();
		
		//then
		$this->assertTrue ($productBacklogPage->isOpened());
		
	}
}