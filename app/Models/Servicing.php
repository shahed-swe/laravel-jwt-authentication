<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Traits\HasUuid;

class Servicing extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasUuid;

    protected $primaryKey = 'uid'; //declaring primary key

    protected $keyType = 'string'; //primary key type

    public $incrementing = false;

    protected $date = ['deleted_at'];


    protected $fillable = [
        "customer_uid",
        "mechanic_uid",
        "dokan_uid",
        "device_name",  
        "device_model",  
        "received_date",
        "delivery_date",
        "total_fee",  
        "advance_payment",  
        "total_cost",  
        "service_charge",  
        "shop_profit",  
        "mechanic_profit",  
        "assigned_to",  
        "description",
        "status",
        "created_by",
        "updated_by",
        "deleted_by",
    ];

}
