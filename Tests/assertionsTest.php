<?php

class AssertionsTest extends PHPUnit_Framework_TestCase {

	/**
	 * @test
	 */
	public function GivenPhoneTrue() {
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
	public function GivenPhoneFalse() {
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
	public function GivenPhoneNULL() {
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
	public function GivenToShortPhone() {
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
	public function GivenToLongPhone() {
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