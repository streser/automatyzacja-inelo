<?php
 function validatePhone($phone) {
	if (preg_match("/^\+(?:[0-9] ?){6,14}[0-9]$/", $phone)) {
		return true;
	}
	return false;
}
class ExampleTest extends PHPUnit_Framework_TestCase {
	/**
	 *  @test
	 */
	public function shouldFail() {
		$this->assertTrue(true);
	}
	
	/**
	 *  @test
	 */
	public function shouldTest() {
		$this->assertTrue(validatePhone('+48123456789'));
		
	}
	/**
	 *  @test
	 */
    public function shouldNotTest() {
		$this->assertFalse(validatePhone('abc123456789'));
		
    }
    /**
     *  @test
     */
	public function shouldToLongPhoneNumber() {
			$this->assertFalse(validatePhone('+4812345678999999999'));
			
	}
	/**
	 *  @test
	 */
    public function   shouldToShortPhoneNumber() {
				$this->assertFalse(validatePhone('+48'));
	}
}


// public function shouldTest() {
// 	$this->asserttue(validatePhone('+48123456789'));
	
// public function shouldTest {
// 	//given
// 	$validator = new PhoneValidator();
	
// 	//when
// 	$results = $validator->validatePhone('+4812345789'));
	
// 	;
// }
// }