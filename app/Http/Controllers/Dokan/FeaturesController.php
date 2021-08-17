<?php

namespace App\Http\Controllers\Dokan;

use App\Http\Controllers\Controller;
use App\Models\Features;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FeaturesController extends Controller
{
    protected $user;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $features = Features::get(['uid','title','description','created_at', 'updated_at']);
        return response()->json($features);
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
            'title' => 'required|string|max:255',
            'description' => 'string|min:5'
        ]);
        if($validator->fails()){
            return response()->json(['status'=>false,'error'=>$validator->errors()],400);
        }

        $features = new Features();
        $features->title = $request->title;
        $features->description = $request->description;

        if($features->save()){
            return response()->json([
                'status'=>true,
                'features'=>$features,
                'message'=>'Features created successfully ',
            ]);
        }else{
            return response()->json([
                'status'=>false,
                'message'=>'Features not created or saved',
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Features  $features
     * @return \Illuminate\Http\Response
     */
    public function show(Features $feature)
    {
        if(!empty($feature)){
            return $feature;
        }else{
            return response()->json([
                'message'=> 'Not exists',
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Features  $features
     * @return \Illuminate\Http\Response
     */
    public function edit(Features $features)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Features  $features
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Features $features)
    {
        $validator = Validator::make($request->all(),[
            'title' => 'required|string|min:3',
            'description' => 'string|min:5',
            
        ]);
        if($validator->fails()){
            return response()->json(['status'=>false,'error'=>$validator->errors()],400);
        }
        $features->title = $request->title;
        $features->description = $request->description;
        
        if($features->save()){
            return response()->json(['status'=>true,'features'=>$features],201);
        }
        else{
            return response()->json([
                'status'=>false,
                'message'=>'Features Not Updated ',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Features  $features
     * @return \Illuminate\Http\Response
     */
    public function destroy(Features $features)
    {
        if($features->delete()){
            return response()->json(['status'=>true,'feature'=>$features],201);
        }
        else{
            return response()->json([
                'status'=>false,
                'message'=>'Features not exists with this id ',
            ]);
        }
    }
}
