<?php
class ProductBackLogPage {
	/**
	 *
	 * @var PHPUnit_Extensions_Selenium2TestCase
	 */
	private $driver;
	public function __construct($driver) {
		$this->driver = $driver;
	}
	public function isOpen() {
		return $this->driver->byName ( "project_id" )->displayed ();
	}
	public function addItem() {
		$this->driver->byLinkText ( "Add item" )->click ();
		$this->driver->waitUntil(function () {return $this->driver->byId("item_user_story")->displayed();
		},5000);
		$this->driver->byName ("item[user_story]" )->value ("mateusz");
		$this->driver->byName ( "commit" )->click ();
		$this->driver->assertTrue($this->driver->byXPath("//div[contains(@class,'item-user-story')][text()='mateusz']")->displayed());
	}
}