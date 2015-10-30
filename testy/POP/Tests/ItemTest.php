<?php
include_once ('testy/POP/Pages/LoginPage.php');

class IteamTest extends PHPUnit_Extensions_Selenium2TestCase
{
	public function setUp() 
	{
		$this->setBrowser ( 'firefox' );
		$this->setBrowserUrl ( 'https://szkolenia.bananascrum.com' );
	}
	
	/**
	 * @test
	 */
	public function addItemTestTest() 
	{
		$loginPage=new LoginPage($this);
		$loginPage->open();
		
		//when
		
		$productBacklogPage=$loginPage->correctLogin();
		
		//then
		$this->assertTrue ($productBacklogPage->isOpened());
		$randomString=$this->randomString();
		$AddItemPage=($productBacklogPage->addItem($randomString));
		
		$findItem=($productBacklogPage->findItem($randomString));
	}
	
	function randomString($length = 10) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen ( $characters );
		$randomString = '';
		for($i = 0; $i < $length; $i ++) {
			$randomString .= $characters [rand ( 0, $charactersLength - 1 )];
		}
		return $randomString;
	}
}