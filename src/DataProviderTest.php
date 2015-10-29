<?php
class DataTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider CorrectPhoneNumberProvider()
     * @test
     */
    public function shoudValidateCorrectPhoneNumber($phone)
    {
    	//when
		$resoult = validatePhone2($phone);
	
		//then
		$this->assertTrue($resoult);
    }
    
    public function CorrectPhoneNumberProvider()
    {
    	return array(
    			'Correct phone number1' => array("+22 3123122"),
    			'Correct phone number2' => array("+2223423442"),
    			'Correct phone number3' => array("+48 23423443")
    	);
    }
    
    
    
    /**
     * @dataProvider IncorrectPhoneNumberProvider()
     * @test
     */
    public function shoudValidateIncorrectPhoneNumber($phone)
    {
    	//when
    	$resoult = validatePhone2($phone);
    
    	//then
    	$this->assertFalse($resoult);
    }
    
    public function IncorrectPhoneNumberProvider()
    {
    	return array(
    			'Incorrect phone number witch chars' => array("+22 23423442asdasd"),
    			'Incorrect to long phone number' => array("+2223423442234234234"),
    			'Incorrect to short phone number' => array("+4823"),
    			'Incorrect phone number without +' => array("6565675823")
    	);
    }
    
}


function validatePhone2($phone) {
	if (preg_match("/^\+(?:[0-9] ?){6,14}[0-9]$/", $phone)) {
		return true;
	}
	return false;
}
?>