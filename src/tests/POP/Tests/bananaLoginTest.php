<?php
include('src/tests/POP/Pages/LoginPage.php');
include('src/tests/POP/Pages/ProductBackLogPage.php');
class bananaLoginTest extends PHPUnit_Extensions_Selenium2TestCase {
	protected function setUp()
	{
		$this->setBrowser('firefox');
		$this->setBrowserUrl('https://szkolenia.bananascrum.com');
	}
	/**
	 * @test
	 */
	public function shouldLogIn() {
		// given
		$loginPage = (new LoginPage ($this))->open ();
		// when
		$productBackLogPage = $loginPage->correctLogin ();
		//then
		$this->assertTrue($productBackLogPage->isOpen());
	}
}