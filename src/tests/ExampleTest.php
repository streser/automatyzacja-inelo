<?php
function validatePhone($phone) {
	if (preg_match("/^\+(?:[0-9] ?){6,14}[0-9]$/", $phone)) {
		return true;
	}
	return false;
}

class ExampleTest extends PHPUnit_Framework_TestCase {
	
	/**
	 * @test
	 */
	public function shouldFail() {
		$this->assertTrue(true);
	}
	
	/**
	 * @test
	 */
	public function shouldBeOne() {
		$x = 1;
		$this->assertEquals($x, 1);
	}
	
	/**
	 * @test
	 * 
	 */
	public function phoneNumberCorrect() {
		$x = '+999999999';
		$this->assertTrue(validatePhone($x));
	}
	
	/**
	 * @test
	 * 
	 */
	public function phoneNumberIncorrect() {
		$x = 'test 123';
		$this->assertFalse(validatePhone($x));
	}
	
	/**
	 * @test
	 * 
	 */
	public function phoneNumberTooLong() {
		$x = '012345678912345';
		$this->assertFalse(validatePhone($x));
	}
	
	/**
	 * @test
	 * 
	 */
	public function phoneNumberTooShort() {
		$x = '012345';
		$this->assertFalse(validatePhone($x));
	}
	
}