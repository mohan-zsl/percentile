<?php
use App\Percentile;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
/**
* @desc test cases for all the percentile conditions
*/
class PercentilTest extends TestCase
{
	private $fileNameTemp = 'public/download/csv/sample_data.csv';//default value of importing file
	private $percentile;

	/**
	* @desc assigns the Percentile class to object
	*/
	function __construct()
    {
        $this->percentile = new Percentile($this->fileNameTemp);
    }

	/**
	* @desc checks whether file exists or not
	*/
	public function testFileExists()
    {
        $this->assertFileExists($this->fileNameTemp);
    }

	/**
	* @desc checks whether extension is csv or not
	*/
	public function testFileExtentsion()
    {
        $this->assertEquals("csv",$this->percentile->getFileExtenstion());
    }
	
	/**
	* @desc checks whether excepted value and result of first rank is same
	*/
	public function testFirstRank()
    {
        $this->assertEquals(2,$this->percentile->getFirstPercentileRank());
    }

	/**
	* @desc checks whether excepted value and result of second rank is same
	*/
	public function testSecondRank()
    {
        $this->assertEquals(58,$this->percentile->getSecondPercentileRank());
    }

	/**
	* @desc checks whether excepted value and result of third rank is same
	*/
	public function testThirdRank()
    {
        $this->assertEquals(98,$this->percentile->getThirdPercentileRank());
    }
}
