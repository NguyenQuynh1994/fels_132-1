<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\EditProfileRequest;
use App\Http\Requests\ChangePassRequest;
use App\Http\Requests\ChangeAvatarRequest;
use Auth;
use App\Models\User;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $activities = Auth::user()->activities;

        return view('user.profile.show', [
            'user' => Auth::user(),
            'activities' => $activities
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('user.profile.edit', ['user' => Auth::user()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditProfileRequest $request, $id)
    {
        $user = Auth::user();
        $user->updateUser($request);

        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getChangePass($id)
    {
        return view('user.profile.changePass', ['user' => Auth::user()]);
    }

    public function postChangePass(ChangePassRequest $request, $id)
    {
        $user = Auth::user();

        if (Hash::check($request->input('password'), $user->password)) {
            $user->updatePassword($request->input('new_password'));

            return redirect('/home');
        } else {

            return redirect()->route('user.profiles.getChangePass');
        }
    }

    public function getChangeAvatar($id)
    {
        return view('user.profile.changeAvatar', ['user' => Auth::user()]);
    }

    public function postChangeAvatar(ChangeAvatarRequest $request, $id)
    {
        $user = Auth::user();
        $user->updateAvatar($request, $user->avatar);

        return redirect('/home');
    }
}
