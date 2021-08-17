<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\HasUuid;

class LoginHistory extends Model
{
    use HasFactory, HasUuid;

    protected $primaryKey = 'uid'; //declaring primary key

    protected $keyType = 'string'; //primary key type

    public $incrementing = false;
    // using soft delete


    // using soft delete
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'user_uid',
        'device_name',
        'location',
        'date_time',
        'latitude',
        'longitude',
        'created_by'
    ];


}
