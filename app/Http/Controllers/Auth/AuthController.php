<?php

namespace App\Http\Controllers\Auth;


use App\Events\LoginHistoryEvent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;


class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);

    }


    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|between:3, 50',
            'email' => 'required|string|email|max:100|unique:users',
            'phone_no'=> 'required|string|max:15|min:11|unique:users',
            'password'=> 'required|string|confirmed|min:8',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        $user = User::create(array_merge(
            $validator->validated()

        ));

        return response()->json([
            'message'=> 'User successfully registered',
            'user'=>[
                'uid' =>$user['uid'],
                'email'=>$user['email'],
                'create'=>$user['created_at'],
            ],
        ],201);
    }

    public function logout()
    {
        $this->guard()->logout();

        return response()->json(['message' => 'User logged out successfully']);

    }


    public function profile()
    {
        return response()->json($this->guard()->user());

    }



    public function refresh(){
        return $this->createNewToken($this->guard()->refresh());
    }

    public function login(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password'=>'required|string|min:8'
        ]);


        if ($validator->fails()){
            return response()->json($validator->errors(), 400); //400 bad request
        }

        $token_validity = 24 * 60; // token for 24 hours

        $this->guard()->factory()->setTTL($token_validity); 

        if(!$token = $this->guard()->attempt($validator->validated())){
            return response()->json([
                'error'=> 'Either email or password is incorrect'
            ], 401);
        }

        event(new LoginHistoryEvent(Auth::user()));

        return $this->createNewToken($token);
    }

    protected function createNewToken($token){
        return response()->json([
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->guard()->factory()->getTTL() * 60, //expires in 1 hour
        ]);
    }

    protected function guard()
    {
        return Auth::guard();
    }


}
