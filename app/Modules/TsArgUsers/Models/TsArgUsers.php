<?php

namespace App\Modules\TsArgUsers\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TsArgUsers extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'ts_user_id',
        'dni',
        'monotributo_id',
        'isMonotributista',
        'IIBB_registered',
        'activities_start_date',
        'unified_monotributo',
        'sIsMonotributista',
        'sRegisteredIIBB',
        'user_create_id',
        'user_update_id'
    ];



    public function tsUser()
    {
        return $this->hasOne(\App\Modules\TsUsers\Models\TsUsers::class, "id", "ts_user_id");
    }

    public function monotributo()
    {
        return $this->hasOne(\App\Modules\TsArgMonotributos\Models\TsArgMonotributos::class, "id", "monotributo_id");
    }

    public function userCreate()
    {
        return $this->hasOne(\App\Modules\Users\Models\Users::class, "id", "user_create_id");
    }

    public function userUpdate()
    {
        return $this->hasOne(\App\Modules\Users\Models\Users::class, "id", "user_update_id");
    }
}
