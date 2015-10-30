<?php



class AboutAssertionsTest extends PHPUnit_Framework_TestCase {

	/**
	 * @test
	 */
public function assertEqualsText() {
		$this->assertTrue("Agata!" == "Agata!");
	}
}
