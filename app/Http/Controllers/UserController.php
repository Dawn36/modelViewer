<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::whereRoleIs('user')->get();
        return view('user/users_index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user/users_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,deleted_at,NULL'],
            'password' => ['required',  Rules\Password::defaults()],
        ]);


        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'contact_no' => $request->phone_number,
            'profile_picture' => $request->profile_picture,
            'company_name' => $request->company_name,
            'created_by' => Auth::user()->id,
            'created_at' => date("Y-m-d"),
            'password' => Hash::make($request->password),
            'password_show' => $request->password,
            'user_type'=>'2'

        ]);
        $user->attachRole($request->role_id);

        if ($request->hasFile('file')) {
            $id = $user['id'];

            $user = User::find($id);
            // $folderName = $userId;
            // $fileName = time();
            // $previousPic = $user->profile_picture;
            // $previousPicDest = "profile/" . $previousPic;
            // File::delete($previousPicDest);
            // $request->profile_picture->storeAs("profile/$folderName/", $fileName . '.jpg', 'public');
            // $user->profile_picture = $folderName . '/' . $fileName . '.jpg';
            $path = "profile/" . $id;
            $file = $request->file('file');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path($path), $filename);
            $user['profile_picture'] = $id  . "/" . $filename;

            $user->save();
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('user/users_edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
        ]);

        $user = User::find($id);

        if ($request->hasFile('file')) {
            $previousPic = $user->profile_picture;
            $previousPicDest = "profile/" . $previousPic;
            $previousPic = $user->profile_picture;
            if ($previousPic != 'blank.png') {
                $previousPicDest = "profile/" . $previousPic;
                File::delete($previousPicDest);
            }
            // File::delete($previousPicDest);
            $path = "profile/" . $id;
            $file = $request->file('file');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path($path), $filename);
            $user['profile_picture'] = $id  . "/" . $filename;
        }
        if ($request->password) {
            $user['password'] = Hash::make($request->password);
            $user['password_show'] = $request->password;
        }

        $user['first_name'] = $request->first_name;
        $user['last_name'] = $request->last_name;
        $user['contact_no'] = $request->contact_no;
        $user['company_name'] = $request->company_name;
        $user['email'] = $request->email;


        $user->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function verifiedUser(Request $request)
    {
        $userId=$request->userId;
        $verif=$request->verif;
        $user = User::find($userId);


        $user['verified'] =  $verif;


        $user->save();

    }
}
