<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Models\Traits\HasUuid;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable, HasUuid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone_no',
        'password',
    ];

    protected $primaryKey = 'uid'; //declaring primary key

    protected $keyType = 'string'; //primary key type

    public $incrementing = false;
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function getJWTIdentifier(){
        return $this->getKey();
    }

    public function getJWTCustomClaims(){
        return [];
    }
    // hashing password
    public function setPasswordAttribute($password){
        if($password !== null & $password !== ""){
            $this->attributes['password'] = bcrypt($password);
        }
    }
    // Relation between Dokan and User which denots who created the dokan information
    public function dokancreate(){
        return $this->hasMany(Dokan::class, 'created_by', 'uid');
    }
    // Relation between Dokan and User which denots who updated the dokan information
    public function dokanupdate(){
        return $this->hasMany(Dokan::class, 'updated_by', 'uid');
    }
    // Relation between Dokan and User which denots who deleted the dokan information
    public function dokandelete(){
        return $this->hasMany(Dokan::class, 'deleted_by', 'uid');
    }

    // Relation between DokanUser and User which denots who created the dokanuser information
    public function dokanusercreated(){
        return $this->hasOne(DokanUser::class, 'created_by','uid');
    }
    // Relation between DokanUser and User which denots who updated the dokanuser information
    public function dokanuserupdated(){
        return $this->hasOne(DokanUser::class, 'updated_by','uid');
    }
    // Relation between DokanUser and User which denots who deleted the dokanuser information
    public function dokanuserdeleted(){
        return $this->hasOne(DokanUser::class,'deleted_by','uid');
    }

    // Relation between DokanUser and User which denots which user belongs to which dokanuser
    public function dokanuser(){
        return $this->hasOne(DokanUser::class,'user_uid','uid');
    }

    // Relation between User and DokanFeatures which denots which user created which DokanFeatues
    public function dokanfeaturecreated(){
        return $this->hasOne(DokanFeatures::class, 'created_by','uid');
    }
    // Relation between User and DokanFeatures which denots which user updated which DokanFeatues
    public function dokanfeatureupdated(){
        return $this->hasOne(DokanFeatures::class, 'updated_by','uid');
    }
    // Relation between User and DokanFeatures which denots which user deleted which DokanFeatues
    public function dokanfeaturedeleted(){
        return $this->hasOne(DokanFeatures::class, 'deleted_by','uid');
    }
    // Relation between User and Employee's Shift which denots which user created which Employee's Shift
    public function employeeshiftcreated(){
        return $this->hasOne(EmployeeShift::class, 'created_by','uid');
    }
    // Relation between User and Employee's Shift which denots which user updated which Employee's Shift
    public function employeeshiftupdated(){
        return $this->hasOne(EmployeeShift::class, 'updated_by','uid');
    }
    // Relation between User and Employee's Shift which denots which user deleted which Employee's Shift
    public function employeeshiftdeleted(){
        return $this->hasOne(EmployeeShift::class, 'deleted_by','uid');
    }

    // Relation between User and Employee's which denots which user is assigned as Employees
    public function employee(){
        return $this->hasOne(Employees::class, 'user_id','uid');
    }

    // Relation between User and Employess to denote the employee's created by
    public function employeecreated(){
        return $this->hasOne(Employees::class, 'created_by','uid');
    }
    // Relation between User and Employess to denote the employee's updated by
    public function employeeupdated(){
        return $this->hasOne(Employees::class, 'updated_by','uid');
    }
    // Relation between User and Employess to denote the employee's deleted by
    public function employeedeleted(){
        return $this->hasOne(Employees::class, 'deleted_by','uid');
    }
    // Relation of dokanactivity denote who create the activity
    public function activitycreated(){
        return $this->hasOne(DokanActivityLog::class, 'created_by','uid');
    }

    // Relation of dokanactivity denote who updated the activity
    public function activityupdated(){
        return $this->hasOne(DokanActivityLog::class, 'updated_by','uid');
    }

    // Relation of dokanactivity denote who create the activity
    public function activitydeleted(){
        return $this->hasOne(DokanActivityLog::class, 'deleted_by','uid');
    }


    // User Setting
    public function setting(){
        return $this->hasOne(Setting::class);
    }

    public function loginhistory(){
        return $this->hasMany(LoginHistory::class);
    }
    
    // A use who invited a member for signing in
    public function dokaninvites(){
        return $this->hasOne(DokanInvites::class, 'invited_by','uid');
    }

    // relation between user and customer table
    public function customer(){
        return $this->hasOne(Customers::class, 'user_id','uid');
    }
}
