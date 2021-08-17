<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Http\Resources\PersonalInfoResource;
use Illuminate\Http\Request;
use Auth;

class PersonalInfoController extends Controller
{
    public function index(){
        return "ok";
        // $personalinfo = PersonalInfo::all();
        // return PersonalInfoResource::collection($personalinfo);
    }

    public function store(Request $request){
        $personalinfo = PersonalInfo::create([
            "name"=>$request->name,
            "email" => $request->email,
            "phone" => $request->phone,
            "nid" => $request->nid,
        ]);
        return new EmployeeShiftResource($personalinfo);

    }

    public function update(Request $request){


        Auth::user()->update([
            "name"=>$request->name,
            "email" => $request->email,
            "phone" => $request->phone,
        ]);

        return response()->json([
            "message" => "User Personal Info Updated"
        ], 200);
    }

    public function destroy(){
        
    }
}
