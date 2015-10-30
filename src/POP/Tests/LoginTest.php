<?php

include 'src/POP/Pages/LoginPage.php';

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
		//given
		$loginPage = new LoginPage($this);
		$loginPage->open();
	
		//when
		$productBacklogPage = $loginPage->corectLogin();
		
		//then
		$this->assertTrue($productBacklogPage->isOpen());
	}
}