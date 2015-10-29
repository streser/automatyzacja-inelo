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
		if ('Product backlog' == $this->driver->byClassName('backlog-header-title')->text())
		{
			return true;
		}
		else
		{
			return false;
		}
	}

}
