<?php
class LoginPage {
	/**
	 *
	 * @var PHPUnit_Extensions_Selenium2TestCase
	 */
	private $driver;
	public function __construct($driver) {
		$this->driver = $driver;
	}
	
	public function open() {
		$this->driver->url( '/' );
		return $this;
	}
	public function correctLogin() {
		$this->tryLogin2("admin","password");
		return new ProductBackLogPage($this->driver);
	}

	private function tryLogin2($user,$password)
	{
		$this->driver->byName("login")->value($user);
		$this->driver->byName("password")->value($password);
		$this->driver->byName("commit")->click();
	}
}