<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Traits\HasUuid;

class EmployeeShift extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasUuid;

    protected $primaryKey = 'uid'; //declaring primary key

    protected $keyType = 'string'; //primary key type

    public $incrementing = false;

    protected $fillable = [
        "title",
        "start_time",
        "end_time",
        "weekend",
        "daily_break_duration",
        "dokan_uid",
        "created_by"
    ];

    protected $date = ['deleted_at'];
    
    // BlameableAttribute for Employee's of Dokan about which employee's belongs to which dokan
    public function dokan(){
        return $this->belongsTo(Dokan::class, 'uid','dokan_uid');
    }
    // Relation between Employee shift table and Employee table
    public function employeeshift(){
        $this->hasOne(Employees::class, 'shift_uid','uid');
    }
    
}
