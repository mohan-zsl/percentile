<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

/**
* @desc controller class send data and get the result from controller
*/
class PercentileController extends BaseController
{
	/**
	* @var initailize file name property
	*/
	private $fileName;

    /**
	* @desc construct which assigns the default filename
	*/
    function __construct()
    {
		$this->fileName = 'download/csv/sample_data.csv';
    }

    /**
	* @desc  connects to model file by sending the csv file 
	* @desc  fetchs the data inside file
	* @desc  does all the calculation to fetch percentile rank of each individual
	* @desc  returns the value to view file to display the output
	*/
	public function getPercentileRank()
	{
		$percentile = new \App\Percentile($this->fileName);
		$data['data'] = $percentile->completPreVal();
        return view('percentil')->with($data);
	}
}
