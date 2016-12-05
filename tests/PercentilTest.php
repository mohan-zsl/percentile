<?php
use App\Percentile;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PercentilTest extends TestCase
{
	public function testHasItemInBox()
    {
        $percentile = new Percentile('public/download/csv/sample_data.csv');
		
        $this->assertEquals(2,$percentile->getPercentileRank());
    }
}
