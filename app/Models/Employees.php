<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Traits\HasUuid;

class Employees extends Model
{

    use HasFactory;
    use SoftDeletes;
    use HasUuid;

    protected $fillable = [
        "user_uid",
        "shift_uid",
        "dokan_uid",
        "age",
        "monthly_salary",
        "overtime_rate",
        "advance_taken",
        "created_by",
        "updated_by",
        "deleted_by"
    ];

    protected $primaryKey = 'uid'; //declaring primary key

    protected $keyType = 'string'; //primary key type

    public $incrementing = false;

    protected $date = ['deleted_at'];
    
    // Blameable attirbute for denoting the Employees
    public function employeeassigned(){
        $this->belongsTo(User::class, 'uid','user_uid');
    }
    // Blameable attribue for denoting the shifts of the employees
    public function employeshift(){
        $this->belongsTo(EmployeeShift::class, 'uid','shift_uid');
    }
    // Blameable attribute for Dokan and Employee's table
    public function employes(){
        $this->belongsTo(Dokan::class, 'uid','dokan_uid');
    }
    // Blameable attribute for Employee created by User
    public function employeecreated(){
        $this->belongsTo(User::class, 'uid','created_by');
    }
    // Blameable attribute for Employee updated by User
    public function employeeupdated(){
        $this->belongsTo(User::class, 'uid','updated_by');
    }
    // Blameable attribute for Employee deleted by User
    public function employeedeleted(){
        $this->belongsTo(User::class, 'uid','deleted_by');
    }



}
