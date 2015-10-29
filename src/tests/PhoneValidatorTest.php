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
	
	/**
	 * @dataProvider correctPhoneNumberProvider
	 * @test
	 */
	public function validateCorrectPhoneNumber($phoneNr) {
		$this->assertTrue(validatePhone($phoneNr));
	}
	
	public function correctPhoneNumberProvider() {
		return array(
				array('+111111111'),
				array('+48 222222222'),
				array('+1234567'),
				array('+48 222222222'),
				array('+48 12345'),
				array('+48 123456789012'),
				array('+48 123456789abc')
		);
	}
	
	/**
	 * @dataProvider incorrectPhoneNumberProvider
	 * @test
	 */
	public function validateIncorrectPhoneNumber($phoneNr) {
		$this->assertFalse(validatePhone($phoneNr));
	}
	
	public function incorrectPhoneNumberProvider() {
		return array(
				array('+'),
				array('+48123456 '),
				array('+12 34567890123456'),
				array('48 222222222'),
				array('abc+48 12345'),
				array('')
		);
	}
	
	
	
	
}