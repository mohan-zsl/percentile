<?php
namespace App;

/**
* @desc Model class to do all database and logical operations
*/
class Percentile
{
    /**
	* @var initailize the array and default value to properties
	*/
	protected $arrContent = array();
	protected $idVal = array();
	protected $fileNameVal;
	protected $lessVal;
	protected $sameVal;
	protected $totalVal;
	protected $prVal;

    /**
	* @desc construct which assigns the default filename
	* @param fileNameVal
	*/
    function __construct($fileNameVal)
    {
        $this->fileName = $fileNameVal;
    }

	/**
	* @desc stores all the ID Values with caluclated value
	*/
	public function completPreVal()
	{
		$this->getCsvContent();
		foreach($this->arrContent as $key=>$value){
			$this->idVal[] = $this->originalIdVal($value);
		}
		return $this->idVal;
	}

	/**
	* @desc fetchs all the csv file contents
	*/
	public function getCsvContent()
	{
		//open the file only for reading
		$file_handle = @fopen($this->fileName ,"r");
		//check the opened file value and reads the contents
		while(! feof($file_handle))
		{
			$this->arrContent[] = fgetcsv($file_handle);
		}
		fclose($file_handle);
		return $this->arrContent;
	}
	
	/**
	*	@desc fetch the current id value and send the precentile calculated value in array
	*	@param sameValue array of fetch the current id value
	*/
	public function originalIdVal($sameValue)
	{
		//initializing value
		$sameVal = $sameValue[2];
		$lessCount = 0;
		$sameCount = 0;
		$precentileCalc = array();

		//assigning default value
		$precentileCalc['id'] = $sameValue[0];
		$precentileCalc['name'] = $sameValue[1];
		$precentileCalc['gpa'] = $sameValue[2];

		//incrementing the same and less value
		foreach($this->arrContent as $key=>$value){
			if($sameVal==$value[2]){ $sameCount+=1; } 
			if($sameVal>$value[2]){ $lessCount+=1; }
		}

		//assigning to the private properties incremented value
		$this->sameVal = $sameCount;
		$this->lessVal = $lessCount;
		$this->totalVal = count($this->arrContent);

		//calls the method which calculates and assigns the percentile value for the particular GPA
		$precentileCalc['rank'] = $this->precentileCalc();

		return $precentileCalc;
	}

	/**
	*	@desc calculates and generates the result based on the input supplied
	*/
	public function precentileCalc(){
		$lessNum = 0.5*($this->sameVal);
		$addNum = $this->lessVal+$lessNum;
		$this->prVal = ((($addNum)/$this->totalVal))*100;
		return $this->prVal;
	}

	/**
	* @desc  test case 1
	* @desc  fetchs the compelete ranks and assign to first rank value
	*/
	public function getFileExtenstion()
	{
		$fileExtention = explode(".",$this->fileName);
        return $fileExtention[1];
	}

	/**
	* @desc  test case 1
	* @desc  fetchs the compelete ranks and assign to first rank value
	*/
	public function getFirstPercentileRank()
	{
		$data = $this->completPreVal();
        return $data[0]['rank'];
	}

    /**
	* @desc  test case 2
	* @desc  fetchs the compelete ranks and assign to first rank value
	*/
	public function getSecondPercentileRank()
	{
		$data = $this->completPreVal();
        return $data[1]['rank'];
	}

    /**
	* @desc  test case 3
	* @desc  fetchs the compelete ranks and assign to first rank value
	*/
	public function getThirdPercentileRank()
	{
		$data = $this->completPreVal();
        return $data[2]['rank'];
	}
}