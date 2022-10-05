<?php

namespace App\Http\Controllers;

use App\Models\TheModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;


class TheModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId=Auth::user()->id;
        if(Auth::user()->hasRole('user'))
        {
            $model= DB::select(DB::raw("SELECT  tm.*,COUNT(dv.`the_models_id`) AS views_count FROM `the_models` tm LEFT JOIN `design_views` dv 
              ON tm.`id` = dv.`the_models_id` 
              where tm.`user_id`='$userId'
              GROUP BY tm.`id`"));
        }
        else
        {
            $model= DB::select(DB::raw("SELECT  tm.*,COUNT(dv.`the_models_id`) AS views_count FROM `the_models` tm LEFT JOIN `design_views` dv 
            ON tm.`id` = dv.`the_models_id` 
            GROUP BY tm.`id`"));
        }
        
        // $model=TheModel::get();
        return view('the-model/the_model_index',compact('model'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('the-model/the_model_create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userId=Auth::user()->id;
        $request->validate([
            'name' => ['required'],
            'model_image' => ['required'],
            '3d_model' => ['required'],
        ]);
        if ($request->hasFile('model_image')) {
            $destinationPath = base_path('public/uploads/the_model/' . $userId);
            $file = $request->file('model_image');
            $fileNameDb=$file->getClientOriginalName();
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $size = $file->getSize();
            $file->move($destinationPath, $filename);
            $modelImg = "uploads/the_model/" .$userId . "/". $filename;
        }
        if ($request->hasFile('3d_model')) {
            $destinationPath = base_path('public/uploads/the_model/' . $userId);
            $file = $request->file('3d_model');
            $fileNameDb=$file->getClientOriginalName();
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $size = $file->getSize();
            $file->move($destinationPath, $filename);
            $model3dImg = "uploads/the_model/" .$userId . "/". $filename;
        }
        $user = TheModel::create([
            'name' => $request->name,
            'model_img' => $modelImg,
            'model_3d_img'=>$model3dImg,
            'user_id'=>$userId,
            'created_at' => date("Y-m-d h:i:s"),
            'created_by' => Auth::user()->id,
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TheModel  $theModel
     * @return \Illuminate\Http\Response
     */
    public function show(TheModel $theModel)
    {
        return view('the-model/the_model_show',compact('theModel'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TheModel  $theModel
     * @return \Illuminate\Http\Response
     */
    public function edit(TheModel $theModel)
    {
        return view('the-model/the_model_edit',compact('theModel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TheModel  $theModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => ['required'],
        ]);
        $userId=Auth::user()->id;
        $model = TheModel::find($id);
        if ($request->hasFile('model_image')) {
            $previousPic = $model->model_img;
                File::delete($previousPic);

            $destinationPath = base_path('public/uploads/the_model/' . $userId);
            $file = $request->file('model_image');
            $fileNameDb=$file->getClientOriginalName();
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $size = $file->getSize();
            $file->move($destinationPath, $filename);
            $modelImg = "uploads/the_model/" .$userId . "/". $filename;
            $model['model_img'] = $modelImg;
            $model->save();
        }
        if ($request->hasFile('3d_model')) {
            $previousPic = $model->model_3d_img;
            File::delete($previousPic);

            $destinationPath = base_path('public/uploads/the_model/' . $userId);
            $file = $request->file('3d_model');
            $fileNameDb=$file->getClientOriginalName();
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $size = $file->getSize();
            $file->move($destinationPath, $filename);
            $model3dImg = "uploads/the_model/" .$userId . "/". $filename;
            $model['model_3d_img'] = $model3dImg;
            $model->save();
        }
        $model['name'] = $request->name;
        $model['description'] = $request->description;
        $model->save();
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TheModel  $theModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $data = TheModel::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function modelQr(Request $request)
    {
        $theModel = TheModel::find($request->model_id);
        return view('the-model/the_model_qr',compact('theModel'));

    }
    public function modelUrl(int $id)
    {
        $theModel = TheModel::find($id);
        return view('the-model/the_model_show_url',compact('theModel'));

    }
}
