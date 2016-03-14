<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Auth;

class UsersController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function edit($id)
    {
        if (Auth::id() != $id) {
            Session::flash('flash_error', 'Unauthorized action!');
            return back();
        }

        $user = User::findOrFail($id);

        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     *
     * @param Request $request
     * @return Response
     */
    public function update($id, Request $request)
    {
        if (Auth::id() != $id) {
            Session::flash('flash_error', 'Unauthorized action!');
            return back();
        }

        $user = User::findOrFail($id);

        $validate['name'] = 'required|max:255';
        $validate['slug'] = 'alpha_num|max:255';
        $newData['name'] = $request->input('name');

        // don't update user password if
        // he left the field blank
        if ($pass = $request->input('password')) {
            $validate['password'] = 'required|min:6|confirmed';
            $newData['password'] = bcrypt($pass);
        }

        // validate email only if user changed it
        if ($user->email != $request->input('email')) {
            $validate['email'] = 'required|email|max:255|unique:users';
            $newData['email'] = $request->input('email');
        }


        $this->validate($request, $validate); // validate

        $newData['slug'] = $request->input('slug');
        $user->update($newData);

        Session::flash('flash_message', 'User has been updated!');

        return redirect('recipes');
    }

}
