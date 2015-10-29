<?php
function validatePhone($phone) {
	if (preg_match ( "/^\+(?:[0-9] ?){6,14}[0-9]$/", $phone )) {
		return true;
	}
	return false;
}
class ExampleTest extends PHPUnit_Framework_TestCase {
	/**
	 * @test
	 */
	public function shouldTest() {
		// given
		$phoneNumber = "+48 111222333";
		
		// when
		$result = validatePhone ( $phoneNumber );
		
		// then
		$this->assertTrue ( $result );
	}
}