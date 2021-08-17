
<?php

use App\Http\Controllers\Customer\CustomersController;
use Illuminate\Support\Facades\Route;




Route::apiResource('customers', CustomersController::class);