<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Validator, Response;

class TokenController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tokens.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $validator = Validator::make($request->all(), [
            'tokenString' => ['required', 'alpha_num', 'min:8', 'max:20'],
        ]);

        if ($validator->fails()) {

            if($request->ajax())
            {
                return Response()->json([
                    'success' => false,
                    'file' => '',
                    'errors' => $validator->getMessageBag()->toArray()
                ], 200);
            }

            $this->throwValidationException(

                $request, $validator

            );
        }

        $user = User::where('email', Auth::user()->email)->first();
        
        if(!$user)
            return ["error" => "404"];

        $token = $user->createToken('myapptoken')->plainTextToken;
        return ['token' => $token];
    }
}
