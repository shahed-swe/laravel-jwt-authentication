<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\StoreSettingRequest;
use App\Http\Requests\Settings\UpdateSettingRequest;
use App\Http\Resources\SettingResource;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(){
        
    }

    public function store(StoreSettingRequest $request){
        
    }

    public function update(UpdateSettingRequest $request, Setting $setting){

        $setting->update($request->all());
        return new SettingResource($setting);

    }   

    public function destory(){

    }
}
