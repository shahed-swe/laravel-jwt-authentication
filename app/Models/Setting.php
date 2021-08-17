<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\HasUuid;

class Setting extends Model
{
    use HasFactory, HasUuid;

    protected $primaryKey = 'uid'; //declaring primary key

    protected $keyType = 'string'; //primary key type

    public $incrementing = false;

    protected $date = ['deleted_at'];

    protected $fillable = [
            "dokan_uid",
            "email",
            "phone",
            "street_address",
            "post_office",
            "post_code",
            "upzilla",
            "district",
            "division",
            "system_notification",
            "sms_notification",
            "email_notification",
            "unseen_message_notification",
            "ecommerce_notification",
            "purchase_notification_for_customer",
            "customer_messaging",
            "supplier_messaging",
            "system_messaging",
            "adds_on_messenger",
            "two_factor_authentication",
            "unauthorized_login_notification",
            "invoice_size",
    ];

}
