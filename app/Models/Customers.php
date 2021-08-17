<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Traits\HasUuid;

class Customers extends Model
{
    use SoftDeletes;
    use HasFactory;
    use HasUuid;

    protected $primaryKey = 'uid'; //declaring primary key

    protected $keyType = 'string'; //primary key type

    public $incrementing = false;
    // using soft delete

    protected $fillable = [
        'total_purchase',
        'total_due',
        'last_payback',
        'nid',
        'nid_scan_copy',
        'image',
        'note',
        'street_address',
        'zip_code',
        'upzilla',
        'district',
        'state'
    ];

    protected $dates = ['deleted_at'];

    // blameable properties for customer user
    public function customeruser(){
        return $this->belongsTo(User::class, 'uid','user_uid');
    }
}
