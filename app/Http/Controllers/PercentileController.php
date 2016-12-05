<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PercentileController extends BaseController
{
	private $fileName;
	private $arrContent = array();
	private $idVal = array();
	private $lessVal;
	private $sameVal;
	private $totalVal;
	private $prVal;
	
    public function __construct()
    {
		//$this->fileName = $fileName;
		$this->fileName = 'download/csv/sample_data.csv';
    }
	public function getPercentileRank()
	{
		$this->arrContent = $this->getCsvContent();
		$data['data'] = $this->completPreVal();
        return view('percentil')->with($data);
	}
	

	/**
	*	@desc stores all the ID Values with caluclated value
	**/
	public function completPreVal(){
		foreach($this->arrContent as $key=>$value){
			$idVal[] = $this->originalIdVal($value);
		}
		return $idVal;
	}
	
	public function getCsvContent(){
		//throws error if the file doesnot exists
		try
		{
			//open the file only for reading
			$file_handle = @fopen($this->fileName ,"r");
			if (!$file_handle) 
			{
				//throws the error to catch block
				throw new \Exception('Failed to open uploaded file');
				Log::info('Failed to open uploaded file');
			}
			//check the opened file value and reads the contents
			while(! feof($file_handle))
			{
				$this->arrContent[] = fgetcsv($file_handle);
			}
			fclose($file_handle);
			return $this->arrContent;
		}
		catch (Exception $e)
		{
			//die("Please upload a valid CSV file.");
			\Log::info('Failed to open uploaded file');
		}
	}
	
	/**
	*	@desc fetch the current id value and send the precentile calculated value in array
	*	@param sameValue array of fetch the current id value
	**/
	public function originalIdVal($sameValue){
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
	**/
	public function precentileCalc(){
		$lessNum = 0.5*($this->sameVal);
		$addNum = $this->lessVal+$lessNum;
		$this->prVal = ((($addNum)/$this->totalVal)/100)*10000;
		return $this->prVal;
	}
}
