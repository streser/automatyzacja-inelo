<?php
include_once 'src/POP/Pages/LoginPage.php';

class ItemTest extends PHPUnit_Extensions_Selenium2TestCase
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
		$productBacklogPage = $loginPage->corectLogin();
		
		//when
		$productBacklogPage->addItem();
		
		//then
		$this->assertTrue($productBacklogPage->isAddedItemOnPage());
	}
}