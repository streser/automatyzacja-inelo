<?php
class BannanaScrumTest extends PHPUnit_Extensions_Selenium2TestCase {

	
	protected function setUp(){
		$this->setBrowser('firefox');
		$this->setBrowserUrl('https://szkolenia.bananascrum.com/');	
	}
	
	
	/**
	 * @test
	 */
	public function shouldLogIn() {

		//given
		$this->url('/');
		
		//when
		$this->TryLogIn ('admin', 'password');
		
		//then
		//rozwiazanie 1 - najlepsze
		$this->assertTrue($this->byLinkText('Logout')->displayed());
		
		//rozwiazanie 2 - najgorsze
		$this->assertEquals('Logout', $this->byXPath('//div[@class="login-links"]/span[3]')->text());
		
		//rozwiazanie 3 - prawie najlepsze
		$this->assertEquals('Logout', $this->byXPath('//div[@class="login-links"]//a[text()="Logout"]')->text());
		
	}
	
	
	public function additionProvider()
	{
		return array(
				array('a','b'),
				array('adsfsd',''),
				array('','bdfasd'),
				array('','')
		);
	}
	
	/**
	 * @dataProvider additionProvider
	 */
	public function testShoulNotdLogIn($login,$pasword) {
	
		//given
		$this->url('/');
	
		$this->TryLogIn ($login, $pasword);
		
		//then
		$this->assertEquals('Login failed', $this->byId('flash')->text());
			
	}
	
	/**
	 * 
	 */private function TryLogIn($login, $pasword) {
		//when
		$this->byId('login')->value($login);
		$this->byId('password')->value($pasword);
		$this->byClassName('button-small')->click();
	}



}