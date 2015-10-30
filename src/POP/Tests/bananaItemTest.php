<?php
include_once('src/POP/Pages/LoginPage.php');
class bananaItemTest extends PHPUnit_Extensions_Selenium2TestCase {
	
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
	public function shouldAddItem() {
		//given
		$loginPage = new LoginPage($this);
		$loginPage->open();
		$productBacklogPage = $loginPage->correctLogin();
		$productBacklogPage->addItem();
		$this->assertTrue($productBacklogPage->isAdded());
		$productBacklogPage->deleteItem();
	}
}