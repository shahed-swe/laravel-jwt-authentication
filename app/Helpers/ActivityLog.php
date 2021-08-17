<?php

namespace App\Helpers;
use Request;
use App\Models\DokanActivityLog as LogActivityModel;
use Illuminate\Support\Facades\Auth;

class LogActivity{
    public static function addToLog($description, $type){
        $log = [];
        $log['description'] = $description;
        $log['type'] = $type;
        $auth = $guard()->check() ? guard()->user()->uid : 1;
        $log['created_by'] = $auth;
        $log['updated_by'] = $auth;
        $log['deleted_by'] = $auth;
        LogActivityModel::create($log);
    }

    public static function LogActivityList(){
        return LogActivityModel::latest()->get();
    }

    protected function guard()
    {
        return Auth::guard();
    }
}