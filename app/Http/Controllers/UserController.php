<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view ('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'regex:/^[a-zA-Z\s]*$/', 'min:3', 'max:255'],
            'email' => ['required', 'email'],
            'gender' => ['required'],
            'status' => ['required'],
            'address_line1' => ['required', 'regex:/^[-a-zA-Z0-9,.\s\/\(\)]*$/', 'min:1', 'max:255'],
            'address_line2' => ['required', 'regex:/^[-a-zA-Z0-9,.\s\/\(\)]*$/', 'min:1', 'max:255'],
            'city' => ['required'],
            'country' => ['required'],
            'password' => ['required', 'min:8', 'max:20'],
        ]);

        $input = $request->all();
        
        $input['password'] = Hash::make($input['password']);
        
        User::create($input);
        return redirect('users')->with('flash_message', 'User Addedd!'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show')->with('user', $user);
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
        return view('users.edit')->with('user', $user);
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
        $this->validate($request, [
            'name' => ['required', 'regex:/^[a-zA-Z\s]*$/', 'min:3', 'max:255'],
            'email' => ['required', 'email'],
            'gender' => ['required'],
            'status' => ['required'],
            'address_line1' => ['required', 'regex:/^[-a-zA-Z0-9,.\s\/\(\)]*$/', 'min:1', 'max:255'],
            'address_line2' => ['required', 'regex:/^[-a-zA-Z0-9,.\s\/\(\)]*$/', 'min:1', 'max:255'],
            'city' => ['required'],
            'country' => ['required'],
        ]);
        
        $user = User::find($id);
        $input = $request->all();
        $user->update($input);
        return redirect('users')->with('flash_message', 'User Updated!');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect('users')->with('flash_message', 'User deleted!');  
    }
}
