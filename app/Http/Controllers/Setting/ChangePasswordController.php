<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UpdatePasswordRequest;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
use App\Models\User;


class ChangePasswordController extends Controller
{
    //
    public function passwordResetProcess(updatePasswordRequest $request){
        return $this->updatePasswordRow($request)->count() > 0 ? $this->resetPassword($request) : $this->tokenNotFoundError();
    }

    private function updatePasswordRow($request){
        return DB::table('password_resets')->where([
            'email'=> $request->email,
            'token'=> $request->resetToken
        ]);
    }

    private function tokenNotFoundError(){
        return response()->json([
            'error'=> 'Either your email or token is wrong'
        ], Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    private function resetPassword($request){
        $userData = User::whereEmail($request->email)->first();
        $userData->update([
            'password'=> $request->password
        ]);

        $this->updatePasswordRow($request)->delete();
        return response()->json([
            'data'=> 'Password has been updated'
        ], Response::HTTP_CREATED);
    }
}
