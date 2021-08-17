
<?php

use App\Http\Controllers\Employee\EmployeesController;
use App\Http\Controllers\Employee\EmployeeShiftController;
use Illuminate\Support\Facades\Route;




//Employee Shift Route
Route::apiResource('employeeshift', EmployeeShiftController::class);
Route::apiResource('employees', EmployeesController::class);