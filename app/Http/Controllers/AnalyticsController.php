<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TheModel;
use Illuminate\Support\Facades\DB;

class AnalyticsController extends Controller
{
    public function index(Request $request)
    {
        $year=Date('Y');
        $model=TheModel::get();
        $modelId=$request->model_id;
        $date=$request->date;
        if($date)
        {
        $year=$date;
        }
       
            $graph= DB::table('the_models AS tm')
            ->join('design_views AS dv', 'dv.the_models_id', '=', 'tm.id')
            ->select(DB::raw('CONVERT(MONTHNAME(dv.`created_at`),char(3)) AS `month`, count(dv.user_id) AS user_count'))
            ->whereYear('dv.created_at',$year)
            ->when($modelId, function ($query, $modelId) {
              return $query->where('tm.id', $modelId);
            })
            ->groupByRaw('CONVERT(MONTHNAME(dv.created_at),char(3))')
            ->orderByDesc('month')
            ->get();
       
       $month=array();
       $userCount=array();
       for ($i=0; $i <count($graph) ; $i++) { 
        array_push($month,$graph[$i]->month);
        array_push($userCount,$graph[$i]->user_count);

       }
       $month=json_encode($month);
       $userCount=json_encode($userCount);
        return view('analytics/analytics_index',compact('model','month','userCount'));
    }
}
