<?php

class validatePhoneFuncionTset extends PHPUnit_Framework_TestCase {

	/**
	 * @test
	 */
	public function shoudValidateCorrectPhoneNumber() {
		//given
		$phone = "+22 3123122";
		
		//when
		$resoult = validatePhone($phone);
		
		//then
		$this->assertTrue($resoult);
	}
	
	/**
	 * @test
	 */
	public function shouldValidateIncorrectPhoneNumberWithChars() {
		//given
		$phone = "+22 3123122aa^%#$%";
	
		//when
		$resoult = validatePhone($phone);
	
		//then
		$this->assertFalse($resoult);
	}
	
	/**
	 * @test
	 */
	public function shouldValidateIncorrectPhoneNumberWitchIsNull() {
		//given
		$phone = null;
	
		//when
		$resoult = validatePhone($phone);
	
		//then
		$this->assertFalse($resoult);
	}
	
	/**
	 * @test
	 */
	public function shouldValidateIncorrectToShortPhoneNumber() {
		//given
		$phone = '+241';
	
		//when
		$resoult = validatePhone($phone);
	
		//then
		$this->assertFalse($resoult);
	}
	
	/**
	 * @test
	 */
	public function shouldValidateIncorrectToLongPhoneNumber() {
		//given
		$phone = '+241123123123213123';
	
		//when
		$resoult = validatePhone($phone);
	
		//then
		$this->assertFalse($resoult);
	}
}

function validatePhone($phone) {
	if (preg_match("/^\+(?:[0-9] ? ){6,14}[0-9]$/", $phone)) {
		return true;
	}
	return false;
}