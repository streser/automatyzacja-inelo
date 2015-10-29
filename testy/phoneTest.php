<?php
function validatePhone($phone) {
	if (preg_match("/^\+(?:[0-9] ?){6,14}[0-9]$/", $phone)) {
		return true;
	}
	return false;
}

class phoneTest extends PHPUnit_Framework_TestCase {

	/**
	 * @test
	 * @dataProvider additionProvider
	 */
	public function shouldValidatePhoneNumbers($phoneNumber, $expected) 
	{
	$result = validatePhone($phoneNumber);
	
	$this->assertEquals($result, $expected);
	}
	
	public function additionProvider()
	{
		return array(
				array('+48 6633333', True),
				array('+48666666', False),
				array('+4812435678901234567890234567', False),
				array('+48asdf2345678', False)
		);
	}

	/**
	 * @test
	 */
	public function shouldFailedWhenPhoneNumberWithLetters() {
		//given
		$phone = "+48 abbbb";
		
		//when
		$return = validatePhone($phone);
		
		//then
		$this -> assertFalse($return);
		}
	
	/**
	* @test
	*/
	public function shouldFailedWhenPhoneNumberTooLong() {
			//given
			$phone = "+48 12345678909876543213456789087654";
		
			//when
			$return = validatePhone($phone);
		
			//then
			$this -> assertFalse($return);
		}
	
		
	/**
	* @test
	*/
	public function shouldFailedWhenPhoneNumberTooShort() {
			//given
			$phone = "+48 123";
		
			//when
			$return = validatePhone($phone);
		
			//then
			$this -> assertFalse($return);
		}
}