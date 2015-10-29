<?php

class ProductBacklogPage
{
	/**
	 * @var PHPUnit_Extensions_Selenium2TestCase 
	 */
	private $driver;
	function __construct($driver) {
		$this->driver = $driver;
	}
	
	public function isOpen()
	{
		if ('szkolenia' == $this->driver->byClassName('domain-name')->text())
		{
			return true;
		}
		else
		{
			return false;
	}
	}

}
