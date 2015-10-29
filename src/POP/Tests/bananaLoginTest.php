<?php
include('src/POP/Pages/LoginPage.php');
class bananaLoginTest extends PHPUnit_Extensions_Selenium2TestCase {
	
	/**
	 * @before
	 */
	protected function setUp() {
		$this->setBrowser('firefox');
		$this->setBrowserUrl('https://szkolenia.bananascrum.com/');
	}
	
	/**
	 * @test
	 */
	public function shouldLogIn() {
		//given
		$loginPage = new LoginPage($this);
		$loginPage->open();
		//when
		$productBacklogPage = $loginPage->correctLogin();
		//then
		$this->assertTrue($productBacklogPage->isOpened());
	}
}