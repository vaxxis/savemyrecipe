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
            abort(403);
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
            abort(403);
        }

        $user = User::findOrFail($id);

        $this->validate($request, [
            'name' =>       'required|max:255',
            // 'email' =>      'required|email|max:255|unique:users',
            'slug' =>       'sometimes|alpha_num|max:255',
            'password' =>   'sometimes|min:6|confirmed',
        ]);

        if ($request->input('password')) {
            $data = $request->all();
            $data['password'] = bcrypt($request->input('password'));
            $user->update($data);
        }
        else {
            $user->update($request->all());
        }

        Session::flash('flash_message', 'User has been updated!');

        return redirect('users/'.$user->id.'/edit');
    }

}
