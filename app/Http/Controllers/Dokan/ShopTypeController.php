<?php

namespace App\Http\Controllers\Dokan;

use App\Http\Controllers\Controller;
use App\Models\ShopType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ShopTypeController extends Controller
{
    protected $user;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shoptype = ShopType::get(['uid','title','description','created_at','updated_at']);
        return response()->json($shoptype);
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

        $shoptype = new ShopType();
        $shoptype->title = $request->title;
        $shoptype->description = $request->description;
        
        if($shoptype->save()){
            return response()->json(['status'=>true,'shoptype'=> $shoptype,'message'=>'Shoptype Created'],201);
        }
        else{
            return response()->json([
                'status'=>false,
                'message'=>'Dokan Not Created or Saved',
            ]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShopType  $shopType
     * @return \Illuminate\Http\Response
     */
    public function show(ShopType $type)
    {
        //
        if(!empty($type)){
            return $type;
        }else{
            return response()->json([
                'message'=>'Not exists',
            ]);
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShopType  $shopType
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ShopType  $shopType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShopType $type)
    {
        $validator = Validator::make($request->all(),[
            'title' => 'required|string|min:3',
            'description' => 'string|min:5',
            
        ]);
        if($validator->fails()){
            return response()->json(['status'=>false,'error'=>$validator->errors()],400);
        }
        $type->title = $request->title;
        $type->description = $request->description;
        
        if($type->save()){
            return response()->json(['status'=>true,'shoptype'=>$type],201);
        }
        else{
            return response()->json([
                'status'=>false,
                'message'=>'Shop Type Not Updated ',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShopType  $shopType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShopType $type)
    {
        if($type->delete()){
            return response()->json(['status'=>true,'shoptype'=>$type],201);
        }
        else{
            return response()->json([
                'status'=>false,
                'message'=>'Shop Type not exists with this id ',
            ]);
        }
    }

}
