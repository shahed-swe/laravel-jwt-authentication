<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Traits\HasUuid;

class Dokan extends Model
{
    use SoftDeletes;
    use HasFactory;
    use HasUuid;

    protected $primaryKey = 'uid'; //declaring primary key

    protected $keyType = 'string'; //primary key type

    public $incrementing = false;
    // using soft delete


    // using soft delete
    protected $fillable = [
        "title",
        "logo",
        "shop_type",
        // "email",
        // "phone"
    ];


    protected $dates = ['deleted_at'];
    //Blamable attribute for dokan create by user
    public function usercreated(){
        return $this->belongsTo(User::class, 'uid', 'created_by');
    }
    // Blamable attribute for dokan updated by user
    public function userupdated(){
        return $this->belongsTo(User::class, 'uid', 'updated_by');
    }
    // Blamable attribute for dokan deleted by user
    public function userdeleted(){
        return $this->belongsTo(User::class, 'uid', 'deleted_by');
    }
    
    // Relation between user table and dokan user table
    public function dokanuser(){
        return $this->hasOne(DokanUser::class,'user_uid','uid');
    }

    // Blameable attribute for shoptype which belongs to dokan
    public function shoptype(){
        return $this->belongsTo(ShopType::class,'uid','shop_type');
    }

    // Relationship between Dokan and DokanFeatures
    public function dokanfeatures(){
        return $this->hasMany(DokanFeatures::class, 'dokan_uid','uid');
    }

    // Relationship between Dokan And it's Employee's Shifts
    public function employeeshift(){
        return $this->hasMany(EmployeeShift::class, 'dokan_uid','uid');
    }
    // Relation between Dokan and Employee
    public function employees(){
        return $this->hasMany(Employees::class,'dokan_uid','uid');
    }

    // Relationship with Activity log
    public function activities(){
        return $this->hasMany(DokanActivityLog::class, 'dokan_uid','uid');
    }

    public function features(){
        return $this->belongsToMany(Features::class);
    }

    public function customers(){
        return $this->hasMany(Customers::class);
    }

}
