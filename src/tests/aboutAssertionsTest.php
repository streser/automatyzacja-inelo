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
	public function shouldTestCorrectPhoneNumber() {
		$this->assertTrue(validatePhone('+48123456789'));
		
	}
	/**
	 *  @test
	 */
    public function shouldTestIncorrectPhoneNumber() {
		$this->assertFalse(validatePhone('abc123456789'));
		
    }
    /**
     *  @test
     */
	public function shouldToLongValidatePhoneNumber() {
			$this->assertFalse(validatePhone('+4812345678999999999'));
			
	}
	/**
	 *  @test
	 */
    public function   shouldToShortValidatePhoneNumber() {
				$this->assertFalse(validatePhone('+48'));
	}
}

class DataTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @dataProvider additionProvider1
	 * @test
	 */
	public function testAdd($a, $b, $expected)
	{
		$this->assertEquals($expected, $a + $b);
	}

	public function additionProvider1()
	{
		return array(
				array(1, 2, 3),
				array(0, 1, 1),
				array(1, 0, 1),
				array(1, 2, 3)
				);
	}	
		
		/**
		 *  @dataProvider additionProvider2
		 *  @test
		 */
	public function   shouldToShortValidatePhoneNumber($phone) {
			$this->assertFalse(validatePhone($phone));
			}
	public function additionProvider2()
	{
		return array(
				array('+481234'),
				array('+481234'),
				array('+481234'),
				array('+481234')
		);
	}
	
	/**
	 *  @dataProvider additionProvider3
	 *  @test
	 */
	public function   shouldToLongtValidatePhoneNumber($phone) {
		$this->assertFalse(validatePhone($phone));
	    }
	public function additionProvider3()
	{
		return array(
				array('+4812345678999999999'),
				array('+4812345678999999999'),
				array('+4812345678999999999'),
				array('+4812345678999999999')
		);
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