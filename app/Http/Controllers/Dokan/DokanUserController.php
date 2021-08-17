<?php

namespace App\Http\Controllers\Dokan;

use App\Http\Controllers\Controller;
use App\Models\DokanUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DokanUserController extends Controller
{
    protected $user;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth:api');
        $this->user = $this->guard()->user();
    }

    public function index()
    {
        $users = $this->user->dokan()->get(['id','name','phone','email','email_verified_at','phone_verified_at','password']);
        return response()->json($users);
        // return "We all are ok";
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'phone' =>'required|string|max:255',
        ]);
        if($validator->fails()){
            return response()->json(['status'=>false,'error'=>$validator->error()],400);
        }

        $user = new DokanUser();
        $user->name = $request->name;
        $user->phone = $request->phone;

        if($this->user->user()->save($user)){
            return response()->json(['status'=>true,'user'=>$user,'massage'=>'DokanUser Created'],201);
        }
        else{
            return response()->json([
                'status'=>false,
                'message'=>'DokanUser Not Created or Saved',
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DokanUser  $dokanUser
     * @return \Illuminate\Http\Response
     */
    public function show(DokanUser $dokanUser)
    {
        return $dokanUser;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DokanUser  $dokanUser
     * @return \Illuminate\Http\Response
     */
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DokanUser  $dokanUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DokanUser $dokanUser)
    {
        $validator = Validator::make($request->all(),[
            'phone' => 'required|string|max:255',
            
        ]);
        if($validator->fails()){
            return response()->json(['status'=>false,'error'=>$validator->errors()],400);
        }
        $dokanUser->phone = $request->phone;
        
        if($this->user->users()->save($dokanUser)){
            return response()->json(['status'=>true,'dokanUser'=>$dokanUser],201);
        }
        else{
            return response()->json([
                'status'=>false,
                'message'=>'DokanUser Not Updated ',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DokanUser  $dokanUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(DokanUser $dokanUser)
    {
        if($dokanUser->delete()){
            return response()->json(['status'=>true,'dokanUser'=>$dokanUser],201);
        }
        else{
            return response()->json([
                'status'=>false,
                'message'=>'DokanUser not exists with this id ',
            ]);
        }
    }
    protected function guard(){
        return Auth::guard();
    }
}
