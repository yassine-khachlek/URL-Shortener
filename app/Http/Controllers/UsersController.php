<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('index', User::class);

        return view('users.index', ['users' => User::paginate(15)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrfail($id);

        $this->authorize('edit', $user);

        return view('users.edit', compact('user'));
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
        $user = User::findOrFail($id);

        $this->authorize('update', $user);

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:1',
            'email' => 'required|email', Rule::unique('users')->ignore($id),
            'password' => 'confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user->name = $request->get('name');
        $user->email = $request->get('email');

        if ($request->get('password')) {
            $user->password = bcrypt($request->get('password'));
        }

        $user->save();

        return redirect()->back();
    }
}
