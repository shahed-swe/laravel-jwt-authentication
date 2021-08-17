<?php

namespace App\Http\Controllers\Dokan;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dokan\StoreDokanRequest;
use App\Http\Requests\Dokan\UpdateDokanRequest;
use App\Http\Resources\DokanResource;
use App\Models\Dokan;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Image;
use DB;


class DokanController extends Controller
{
    //
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
        //
        $dokans = $this->user->dokancreate()->get(['uid','title','shop_type','created_by','updated_by','deleted_by']);
        return DokanResource::collection($dokans);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDokanRequest $request)
    {

        DB::beginTransaction();
        try{
            
            // Creating Dokan
            $dokan = new Dokan();
            $dokan->title = $request->title;
            $dokan->shop_type = $request->shop_type;
            $dokan->created_by = $this->user->uid;

            $this->user->dokancreate()->save($dokan);

            // Creating Dokan Setting
            $setting = new Setting();
            $setting->dokan_uid = $dokan->uid;

            // Populating pivot table
            $rows = [];
            foreach ($request->features as $feature) {

                //collect all inserted record IDs
                $rows[$feature] = [
                    "dokan_uid" => $dokan->uid,
                    "features_uid" => $feature,
                    "created_by" => $this->user->uid
                ];  
            
            }

            $dokan->features()->sync($rows);

            DB::commit();
            return new DokanResource($dokan);

        }catch(\Exception $e){
            DB::rollback();
            throw $e;
        }

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dokan  $dokan
     * @return \Illuminate\Http\Response
     */
    public function show(Dokan $dokan)
    {
        //
        return new DokanResource($dokan);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dokan  $dokan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDokanRequest $request, Dokan $dokan)
    {

        DB::beginTransaction();
        try{

            $name = uniqid().time();
            // uploading dokan logo
            $logo = uploadImage($request, "logo", "dokan/logos", $name, 120, 120);
            
            $dokan->title = $request->title;
            $dokan->logo = $logo;
            $this->user->dokanupdate()->save($dokan);

            if($request->email && $request->phone){

                $setting = $dokan->setting;
                if(!$setting){
                    $setting = new Setting();
                    $setting->dokan_uid = $dokan->uid;
                } 

                $setting->email = $request->email;
                $setting->phone = $request->phone;
                $setting->save();
            }
            
            DB::commit();
            return new DokanResource($dokan);

        }catch(\Exception $e){
            
            DB::rollback();
            throw $e;

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dokan  $dokan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dokan $dokan)
    {
        //
        if($dokan->delete()){
            if(file_exists(public_path()."/".$dokan->logo))
                unlink(public_path()."/".$dokan->logo);
            
            return response()->json(['status'=>true,'dokan'=> $dokan],201);
        }
        else{
            return response()->json([
                'status'=>false,
                'message'=>'Dokan not exists with this id ',
            ]);
        }
    }

    protected function guard(){
        return Auth::guard();
    }
}
