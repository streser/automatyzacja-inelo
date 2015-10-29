<?php
function validatePhone($phone) {
	if (preg_match("/^\+(?:[0-9] ?){6,14}[0-9]$/", $phone)) {
		return true;
	}
	return false;
}

class PhoneValidatorTest extends PHPUnit_Framework_TestCase {
	
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
	public function shouldPassCorrectPhoneNumber() {
		$phoneNr = '+999999999';
		$this->assertTrue(validatePhone($phoneNr));
	}
	
	/**
	 * @test
	 * 
	 */
	public function shouldFailPhoneNumberWithLetters() {
		$phoneNr = 'test 123';
		$this->assertFalse(validatePhone($phoneNr));
	}
	
	/**
	 * @test
	 * 
	 */
	public function shouldFailTooLongPhoneNumber() {
		$phoneNr = '012345678912345';
		$this->assertFalse(validatePhone($phoneNr));
	}
	
	/**
	 * @test
	 * 
	 */
	public function shouldFailTooShortPhoneNumber() {
		$phoneNr = '012345';
		$this->assertFalse(validatePhone($phoneNr));
	}
	
}