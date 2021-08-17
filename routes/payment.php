
<?php

use App\Http\Controllers\Payment\WithdrawController;
use Illuminate\Support\Facades\Route;




Route::apiResource('withdraw', WithdrawController::class);