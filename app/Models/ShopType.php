<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Traits\HasUuid;

class ShopType extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasUuid;
    
    protected $primaryKey = 'uid'; //declaring primary key

    protected $keyType = 'string'; //primary key type

    public $incrementing = false;

    protected $dates = ['deleted_at'];


    protected $fillable = [
        'title',
        'description',
    ];

    
    // This denots the relationship between ShopTypes and Dokans about which shoptype belongs to which Dokan
    public function dokans(){
        return $this->hasOne(Dokan::class,'shop_type','uid');
    }
}
