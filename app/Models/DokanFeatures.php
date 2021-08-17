<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Traits\HasUuid;

class DokanFeatures extends Model
{
    // A pivot table to relate between features and dokans
    use HasFactory;
    use SoftDeletes;
    use HasUuid;

    protected $primaryKey = 'uid'; //declaring primary key

    protected $keyType = 'string'; //primary key type

    public $incrementing = false;

    protected $date = ['deleted_at'];

    // Blameable attribute for dokanfeatures which belongs to Dokan
    public function dokanfeature(){
        return $this->belongsTo(Dokan::class, 'uid','dokan_id');
    }

    // Blameable attribute for Features which belongs to Features
    public function feature(){
        return $this->belongsTo(Features::class,'uid','features_id');
    }
}
