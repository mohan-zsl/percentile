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
	* @desc checks whether file extension is csv or not
	*/
	public function testFileExtentsion()
    {
		$exceptedResult = 'csv';//check file extenstion
        $this->assertEquals($exceptedResult,$this->percentile->getFileExtenstion());
    }
	
	/**
	* @desc checks whether excepted value and result of Randy Perez's rank is same
	*/
	public function testFirstRank()
    {
		$exceptedResult = 2;//Randy Perez's rank
        $this->assertEquals($exceptedResult,$this->percentile->getFirstPercentileRank());
    }

	/**
	* @desc checks whether excepted value and result of Alice Brown's rank is same
	*/
	public function testSecondRank()
    {
		$exceptedResult = 58;//Alice Brown's rank
        $this->assertEquals($exceptedResult,$this->percentile->getSecondPercentileRank());
    }

	/**
	* @desc checks whether excepted value and result of Maria Russel's rank is same
	*/
	public function testThirdRank()
    {
		$exceptedResult = 98;//Maria Russel's rank
        $this->assertEquals($exceptedResult,$this->percentile->getThirdPercentileRank());
    }
}