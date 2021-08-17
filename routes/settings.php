
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Setting\ChangePasswordController;
use App\Http\Controllers\Setting\PasswordResetRequestController;
use App\Http\Controllers\Setting\SettingController;



Route::apiResource('settings', SettingController::class);
Route::post('sendpasswordresetlink', [PasswordResetRequestController::class,'sendEmail']);
Route::post('resetpassword', [ChangePasswordController::class,'passwordResetProcess']);
//Personal Info Route
Route::put('personalinfo/{id}', [PersonalInfoController::class, 'update']);