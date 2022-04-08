<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;

class TokenController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('email', Auth::user()->email)->first();
        
        if(!$user)
            return ["error" => "404"];

        $token = $user->createToken('myapptoken')->plainTextToken;
        return ['token' => $token];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::where('email', 'anirudh.m.mathur@gmail.com')->first();
        $token = $user->createToken('myapptoken')->plainTextToken;
        return ['token' => $token];
    }
}
