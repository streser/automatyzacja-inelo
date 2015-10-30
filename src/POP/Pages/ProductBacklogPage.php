<?php

class ProductBacklogPage
{
	/**
	 * @var PHPUnit_Extensions_Selenium2TestCase 
	 */
	private $driver;
	private $unikeString;
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
	
	public function addItem()
	{
		$this->driver->byClassName('new-backlog-item-button')->click();
		$this->driver->waitUntil(function () {
    		return $this->driver->byId('item_user_story');
		}, 5000);
		$this->unikeString = $this->generateRandomString();
		$this->driver->byId('item_user_story')->value($this->unikeString);
		$this->driver->byId('item_description')->value('Description1');
		//$this->driver->byId('item_estimate')->value('5.0');
		$this->driver->byName('commit')->click();
	}
	
	public function isAddedItemOnPage()
	{
		$this->driver->waitUntil(function () {
			return $this->driver->byXPath("//div[contains(text(),'".$this->unikeString."')]")->enabled();
		}, 1500);
			return true;
	}
	
	private function generateRandomString($length = 10) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
}
