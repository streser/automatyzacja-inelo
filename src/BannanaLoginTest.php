<?php
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
		$this->url('/');
		$this->byClassName('login')->value('admin');
		$this->byId('password')->value('password');
		$this->assertEquals('szkolenia', $this->byClassName('domain-name')->text());
	}

}