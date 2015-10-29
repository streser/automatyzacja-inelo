<?php
class AboutPrzykladTest extends PHPUnit_Framework_TestCase {

	function validatePhone($phone) {
		if (preg_match("/^\+(?:[0-9] ?){6,14}[0-9]$/", $phone)) {
			return true;
		}
		return false;
	}
	
	
	/**
	 * @test
	 */
	public function ShouldPassWhenCorrectPhoneNumber() {
		
		//giben
		$phone = "+48 159786345";
		
		//when
		$return = $this->validatePhone($phone);
		
		//then
		$this->assertTrue($return);
				
	}
	
	/**
	 * @test
	 */
	public function ShoutdFalseWhenPhoneNumberTooLong() {
	
		//giben
		$phone = "+48 159786345324324344234242423432423432";
	
		//when
		$return = $this->validatePhone($phone);
	
		//then
		$this->assertFalse($return);
	
	}
	
	/**
	 * @test
	 */
	public function ShouldFalseWhenPhoneNumberTooShortPhoneNumber() {
	
		//giben
		$phone = "124";
	
		//when
		$return = $this->validatePhone($phone);
	
		//then
		$this->assertFalse($return);
	
	}
	
	/**
	 * @test
	 */
	public function ShouldFalseWhenPhoneNumberWihtNoPlusSign() {
	
		//giben
		$phone = "123654789";
	
		//when
		$return = $this->validatePhone($phone);
	
		//then
		$this->assertFalse($return);
	
	}
	
	/**
	 * @test
	 */
	public function ShouldFailWhenGiveEmptyPhoneNumber() {
	
		//giben
		$phone = "";
	
		//when
		$return = $this->validatePhone($phone);
	
		//then
		$this->assertFalse($return);
	
	}
	
	/**
	 * @test
	 */
	public function ShouldFalseWhenGiveLetterInPhoneNumber() {
	
		//giben
		$phone = "dsafasdf";
	
		//when
		$return = $this->validatePhone($phone);
	
		//then
		$this->assertFalse($return);
	
	}
	
	
}