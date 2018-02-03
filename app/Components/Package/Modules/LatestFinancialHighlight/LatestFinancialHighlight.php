<?php

namespace App\Components\Package\Modules\LatestFinancialHighlight;

use Illuminate\Database\Eloquent\Model;
use Session;

class LatestFinancialHighlight extends Model
{
  	protected $table = 'latest_financial_highlights';


  	public function getFinancialResult()
  	{


  	 	$last =     LatestFinancialHighlight::where('company_id', Session::get('company_id'))
  							->where('is_archive', 1)
  							->where('is_deleted', 0)
                            ->select('year')
                            ->groupBy('year')
                            ->paginate(4);

        $data 		= array();
        $arr  		= array();
        $result 	= array();

        foreach ($last as $value) {
        	$quarter = LatestFinancialHighlight::where('company_id', Session::get('company_id'))
        										->where('year', $value->year)->where('is_archive', 1)->where('is_deleted', 0)
        										->orderBy('quarter', 'desc')->get();

			$arr = array('year' => $value->year, 'quarter' => $quarter);
			$result[] = $arr;

        }
        $data = array('page' => $last, 'result' => $result);
        return $data;
  	}
}