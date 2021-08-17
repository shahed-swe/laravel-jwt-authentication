<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\HasUuid;
use Illuminate\Database\Eloquent\SoftDeletes;

class DokanActivityLog extends Model
{
    use HasFactory;
    use HasUuid;
    use SoftDeletes;

    protected $primaryKey = 'uid'; //declaring primary key

    protected $keyType = 'string'; //primary key type

    public $incrementing = false;

    protected $fillable = [
        'type',
        'description'
    ];

    protected $dates = [
        'deleted_at',
    ];
    // Soft Deletes

    // Activity logs for dokan
    public function dokanactivity(){
        return $this->belongsTo(Dokan::class, 'uid', 'dokan_id');
    }

    // Denots activity belongs to -- Blameable property
    public function activitycreated(){
        return $this->belongsTo(User::class, 'uid','created_by');
    }
    
    public function activityupdated(){
        return $this->belongsTo(User::class, 'uid', 'updated_by');
    }

    public function activitydeleted(){
        return $this->belongsTo(User::class, 'uid', 'deleted_by');
    }
}
