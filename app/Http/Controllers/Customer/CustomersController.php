<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Resources\CustomerResource;
use App\Models\Customers;
use Illuminate\Http\Request;
use DB;
use App\Models\Dokan;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dokan = Dokan::find($request->dokan_uid);
        $customers = [];
        
        if($dokan && $request->q){
            $customers = $dokan->customers()
                ->join("users", 'customers.user_uid', 'users.uid')
                ->where('name', 'like', "%$request->q%")
                ->orWhere("email", "like", "%$request->q%")
                ->orWhere("phone_no", "like", "%$request->q%")
                ->orWhere("nid", "like", "%$request->q%")
                ->orWhere("note", "like", "%$request->q%")
                ->orWhere("street_address", "like", "%$request->q%")
                ->orWhere("zip_code", "like", "%$request->q%")
                ->orWhere("post_office", "like", "%$request->q%")
                ->orWhere("upzilla", "like", "%$request->q%")
                ->orWhere("district", "like", "%$request->q%")
                ->orWhere("state", "like", "%$request->q%")
                ->get();
        }else if($dokan){
            $customers = $dokan->customers()->join("users", 'customers.user_uid', 'users.uid')->get();
        }
        
        return CustomerResource::collection($customers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function show(Customers $customers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function edit(Customers $customers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customers $customers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customers $customers)
    {
        //
    }


}
