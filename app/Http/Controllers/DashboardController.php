<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TheModel;

class DashboardController extends Controller
{
    public function index()
    {
        $userId=Auth::user()->id;
        $themodelcount=TheModel::where('user_id',$userId)->count();
        return view('dashboard',compact('themodelcount'));
        // if(Auth::user()->hasRole('admin'))
        // {
        // }
        // if(Auth::user()->hasRole('user'))
        // {
        //     return redirect()->route('the_model.index');
        // }        

    }
}
