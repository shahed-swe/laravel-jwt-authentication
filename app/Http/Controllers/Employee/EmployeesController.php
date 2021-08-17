<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\Employee\StoreEmployeeRequest;
use App\Http\Resources\EmployeeResource;
use App\Models\Employees;
use Illuminate\Http\Request;
use Auth;

class EmployeesController extends Controller
{

    private $user = null;

    public function __construct(){
        $this->middleware('auth:api');
        $this->user = Auth::user();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = $this->user->dokancreate()
                    ->find(request()->dokan_uid)
                    ->employees;
        return EmployeeResource::collection($employees);
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
    public function store(StoreEmployeeRequest $request)
    {   
        
        $employee = Employees::create([
            "user_uid" => $this->user->uid,
            "shift_uid" => $request->shift_uid,
            "dokan_uid" => $request->dokan_uid,
            "age" => $request->age,
            "monthly_salary" => $request->monthly_salary,
            "overtime_rate" => $request->overtime_rate,
            "advance_taken" => $request->advance_taken,
            "created_by" => $this->user->uid,
        ]);

        return new EmployeeResource($employee);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function show(Employees $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function edit(Employees $employees)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employees $employee)
    {

        $employee->update([
            "shift_id" => $request->shift_id,
            "dokan_id" => $request->dokan_id,
            "age" => $request->age,
            "monthly_salary" => $request->monthly_salary,
            "overtime_rate" => $request->overtime_rate,
            "advance_taken" => $request->advance_taken,
        ]);

        return new EmployeeResource($employee); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employees $employee)
    {
 
        if($employee->delete())
            return response()->json(["message" => "Employee Deleted"], 200);

        return response()->json(["error" => "Failed to Delete"], 422);
    }
}
