
<?php

use App\Http\Controllers\Dokan\DokanController;
use App\Http\Controllers\Dokan\FeaturesController;
use App\Http\Controllers\Dokan\ShopTypeController;
use Illuminate\Support\Facades\Route;




Route::apiResource('dokans', DokanController::class);
Route::apiResource('types', ShopTypeController::class);
Route::apiResource('features', FeaturesController::class);