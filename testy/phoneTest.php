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
	 */
public function phoneNumberWithNumbersTrue() {
	//given
	$phone = "+48 600366302";
	
	//when
	$return = validatePhone($phone);
	
	//then
	$this -> assertTrue($return);
	}


/**
 * @test
 */
public function phoneNumberWithLettersFalse() {
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
public function phoneNumberTooLongFalse() {
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
public function phoneNumberTooShortFalse() {
		//given
		$phone = "+48 123";
	
		//when
		$return = validatePhone($phone);
	
		//then
		$this -> assertFalse($return);
	}
}