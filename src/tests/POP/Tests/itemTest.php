<?php
include_once ('src/tests/POP/Pages/LoginPage.php');
include_once ('src/tests/POP/Pages/ProductBackLogPage.php');

class itemTest extends PHPUnit_Extensions_Selenium2TestCase {
	protected function setUp() {
		$this->setBrowser ( 'firefox' );
		$this->setBrowserUrl ( 'https://szkolenia.bananascrum.com' );
	}
	/**
	 * @test
	 */
	public function addItemTest() {
		$loginPage = (new LoginPage ( $this ))->open ();
		$productBackLogPage = $loginPage->correctLogin ();
		$productBackLogPage->addItem ();
		//$productBackLogPage->isItemAdded ();
	}
}