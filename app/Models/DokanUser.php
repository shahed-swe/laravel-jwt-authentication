<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Traits\HasUuid;

class DokanUser extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasUuid;

    protected $primaryKey = 'uid'; //declaring primary key

    protected $keyType = 'string'; //primary key type

    public $incrementing = false;

    protected $date = ['deleted_at'];

    protected $fillable = [
        'role',
    ];
    
    // Blameable attribute for DokanUser which belongs to User
    public function user(){
        return $this->belongsTo(User::class, 'uid', 'user_id');
    }

    // Blameable attribute for DokanUser which belongs to Dokan
    public function dokan(){
        return $this->belongsTo(Dokan::class, 'uid', 'dokan_id');
    }

    // Blameable attribute for DokanUser which belongs to User about when did this dokanuser created
    public function usercreated(){
        return $this->belongsTo(User::class, 'uid', 'created_by');
    }
    // Blameable attribute for DokanUser which belongs to User about when did this dokanuser updated
    public function userupdated(){
        return $this->belongsTo(User::class, 'uid','updated_by');
    }
    // Blameable attribute for DokanUser which belongs to User about when did this dokanuser deleted
    public function userdeleted(){
        return $this->belongsTo(User::class, 'uid','deleted_by');
    }
}
