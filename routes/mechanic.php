
<?php

use App\Http\Controllers\Mechanic\MechanicController;
use App\Http\Controllers\Mechanic\ServicingController;
use Illuminate\Support\Facades\Route;




Route::apiResource('mechanics', MechanicController::class);
Route::apiResource('servicing', ServicingController::class);