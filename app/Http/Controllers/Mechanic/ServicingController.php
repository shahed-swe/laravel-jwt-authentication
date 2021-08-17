<?php

namespace App\Http\Controllers\Mechanic;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mechanic\StoreServicingRequest;
use App\Http\Requests\Mechanic\UpdateServicingRequest;
use App\Http\Resources\ServicingResource;
use App\Models\Mechanic;
use App\Models\Servicing;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;

class ServicingController extends Controller
{
   
     protected $user;
  
     public function __construct(){
         $this->middleware('auth:api');
         $this->user = Auth::user();
     }

    public function index()
    {
        return ServicingResource::collection(Servicing::all());
    }


    public function create()
    {
        //
    }


    public function store(StoreServicingRequest $request)
    {

        $mechanic = Mechanic::find($request->mechanic_uid);
        $service_charge = floatval($request->total_fee) - floatval($request->tota_cost);
        $mechanic_profit = ($mechanic->mechanic_percentage / 100) * $service_charge;
        $shop_profit = ( (100 - $mechanic->mechanic_percentage) / 100) * $service_charge;

        $servicing = Servicing::create([
            "customer_uid" => $request->customer_uid,
            "mechanic_uid" => $request->mechanic_uid,
            "dokan_uid" => $request->dokan_uid,
            "device_name" =>  $request->device_name,
            "device_model" =>  $request->device_model,
            "delivery_date" => $request->delivery_date,
            "total_fee" =>  $request->total_fee,
            "advance_payment" =>  $request->advance_payment,
            "total_cost" =>  $request->total_cost,
            "description" => $request->description,
            "created_by" => $this->user->uid,
            "received_date" => Carbon::now()->toDateString(),
            "service_charge" => $service_charge,
            "shop_profit" => $shop_profit,
            "mechanic_profit" => $mechanic_profit,
            "status" => "Processing"
        ]);

        return new ServicingResource($servicing);

    }


    public function show(Servicing $servicing)
    {
        //
    }

    public function edit(Servicing $servicing)
    {
        //
    }

    public function update(UpdateServicingRequest $request, Servicing $servicing)
    {
        $mechanic = Mechanic::find($request->mechanic_uid);
        $service_charge = floatval($request->total_fee) - floatval($request->tota_cost);
        $mechanic_profit = ($mechanic->mechanic_percentage / 100) * $service_charge;
        $shop_profit = ( (100 - $mechanic->mechanic_percentage) / 100) * $service_charge;

        $servicing->update([
            "customer_uid" => $request->customer_uid,
            "mechanic_uid" => $request->mechanic_uid,
            "dokan_uid" => $request->dokan_uid,
            "device_name" =>  $request->device_name,
            "device_model" =>  $request->device_model,
            "delivery_date" => $request->delivery_date,
            "total_fee" =>  $request->total_fee,
            "advance_payment" =>  $request->advance_payment,
            "total_cost" =>  $request->total_cost,
            "description" => $request->description,
            "created_by" => $this->user->uid,
            "received_date" => Carbon::now()->toDateString(),
            "service_charge" => $service_charge,
            "shop_profit" => $shop_profit,
            "mechanic_profit" => $mechanic_profit,
            "status" => "Processing"
        ]);

        return new ServicingResource($servicing);
    }

    public function destroy(Servicing $servicing)
    {
        
        if($servicing->delete())
            return response()->json(["message" => "Deleted Successfully"], 200);
        else
            return response()->json(["error" => "Failed to Delete"], 422);
    }
}
