<?php

namespace App\Models\Traits;

use Illuminate\Support\Str;

// use App\Helpers\Helper;

trait HasUuid{
    protected static function bootHasUuid(){

        static::creating(function($model){
            if(empty($model->{$model->getKeyName()})){
                $model->{$model->getKeyName()} = time().rand(100000,999999);
            }
        });
    }
}