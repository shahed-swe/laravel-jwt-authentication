<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Traits\HasUuid;

class MechanicWithdraw extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasUuid;

    protected $primaryKey = 'uid'; //declaring primary key

    protected $keyType = 'string'; //primary key type

    public $incrementing = false;

    protected $date = ['deleted_at'];
}
