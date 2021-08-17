<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeShift\StoreEmployeeShiftRequest;
use App\Http\Requests\EmployeeShift\UpdateEmployeeShiftRequest;
use App\Http\Resources\EmployeeShiftResource;
use App\Models\EmployeeShift;
use Illuminate\Http\Request;
use Auth;

class EmployeeShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shift = EmployeeShift::all();
        return EmployeeShiftResource::collection($shift);
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
    public function store(StoreEmployeeShiftRequest $request)
    {
        $employeeShift = EmployeeShift::create([
            "title"=>$request->title,
            "start_time" => $request->start_time,
            "end_time" => $request->end_time,
            "weekend" => $request->weekend,
            "daily_break_duration" => $request->daily_break_duration,
            "dokan_uid" => $request->dokan_uid,
            "created_by" => Auth::user()->uid
        ]);
        
        return new EmployeeShiftResource($employeeShift);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmployeeShift  $employeeShift
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeShift $employeeShift)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmployeeShift  $employeeShift
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeeShift $employeeShift)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmployeeShift  $employeeShift
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeShiftRequest $request, EmployeeShift $employeeshift)
    {
        $employeeshift->update([
            "title"=>$request->title,
            "start_time" => $request->start_time,
            "end_time" => $request->end_time,
            "weekend" => $request->weekend,
            "daily_break_duration" => $request->daily_break_duration,
            "dokan_id" => $request->dokan_id,
        ]);
        return new EmployeeShiftResource($employeeshift);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmployeeShift  $employeeShift
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeShift $employeeshift)
    {
        if($employeeshift->delete())
            return response()->json(["message" => "Employee Shift Deleted"], 200);

        return response()->json(["error" => "Failed to Delete"], 422);
    }
}
