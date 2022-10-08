<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TheModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon;

class DesignController extends Controller
{
    public function index(Request $request)
    {
        $usersId=User::whereRoleIs('admin')->pluck('id')->toArray();
        $search=$request->search;
        $theModel=TheModel::whereIn('user_id',$usersId)->orderBy('id', 'desc')
        ->when($search, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%')->orWhere('description', 'like', '%'.$search.'%');
        })
        ->paginate(9);
        $theModel->appends(['search' => $search]);
        return view('design/design_index',compact('theModel'));
    }
  
    public function modelShow(int $id)
    {
        $theModel = TheModel::find($id);
        if(Auth::user()->hasRole('user'))
        {
        $dateTime=Controller::currentDateTime();
        $userId=Auth::user()->id;
        $designView=DB::table('design_views')->where('user_id',$userId)->where('the_models_id',$id)->get();
        if(count($designView) == 0)
        {
            DB::insert('insert into design_views 
            (user_id,the_models_id,created_at,created_by) values(?,?,?,?)',
            [$userId,$id,$dateTime,$userId]);
        }
        }
        return view('the-model/the_model_show',compact('theModel'));
        
    }
}
