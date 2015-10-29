<?php
class ValidateLoginTest extends PHPUnit_Extensions_Selenium2TestCase
{
		protected function setUp()
    {
        $this->setBrowser('firefox');
        $this->setBrowserUrl('https://szkolenia.bananascrum.com');
    }
    /**
     *  @test
     */
    public function testTitle()
    {
        $this->url('/');
        $this->byName("login")->value("admin");
        $this->byName("password")->value("password");
        $this->byName("commit")->click();
        $this->assertTrue($this->byName("project_id")->displayed());
    }
	/**
	 *  @test
	 */
	public function tryLogin()
    {
        $this->url('/');
        $this->tryLogin2("admin","password");
		$this->assertTrue($this->byName("project_id")->displayed());		    
    }
	/**
	 * 
	 */
    private function tryLogin2($user,$password) 
	{
		$this->byName("login")->value($user);
        $this->byName("password")->value($password);
        $this->byName("commit")->click();
	}

}
?>