<?php
class ProductBacklogPage  {
	/**
	 *
	 * @var PHPUnit_Extensions_Selenium2TestCase
	 */
	private $driver;
	
	/**
	 * 
	 * @var array
	 */
	private $newItem = array(
			'item_user_story'
	);
	
	public function __construct($driver) {
		$this->driver = $driver;
	}
	
	public function isOpened() {		
		return $this->driver->byLinkText('Logout')->displayed();		
	}
	
	public function addItem() {
		$this->driver->byClassName('new-backlog-item-button')->click();
		$this->driver->waitUntil(function($driver) {
			if ($driver->byId('item_user_story')) {
				return true;
			}
			return null;
		}, 5000);
		$this->newItem['item_user_story'] = 'Test karolina user story '.time();
		$this->driver->byId('item_user_story')->value($this->newItem['item_user_story']);
		$this->driver->byId('item_description')->value('Test karolina description');
		$this->driver->byXPath('//div[@class="new-item-form-controls"]/input')->click();
		
	}
	
	public function isAdded() {
		$this->driver->waitUntil(function($driver) {
			return $driver->byXPath('//div[contains(text(),"'.$this->newItem['item_user_story'].'")]')->displayed();
		}, 5000);
		return true;
	}
	
	public function deleteItem() {
		$this->driver->byXPath('//div[div[contains(text(),"'.$this->newItem['item_user_story'].'")]]//img[@class="trash delete-item"]')->click();
		$this->driver->acceptAlert();

		$this->driver->waitUntil(function($driver) {
			if (!$driver->byXPath('//div[contains(text(),"'.$this->newItem['item_user_story'].'")]')->displayed()) {
				return true;
			}
			return null;
		}, 5000);
	}
}