<?php

namespace App\Modules\TsUserContacts\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TsUserContacts extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'street',
        'phone',
        'email',
        'type_id',
        'photo',
        'ts_user_id',
        'number',
        'floor',
        'department',
        'city',
        'postal_code',
        'additional_data_type',
        'additional_data',
        'vat_condition_id',
        'enabled',
        'province_id',
        'company_name',
        'user_create_id',
        'user_update_id'
    ];



    public function type()
    {
        return $this->hasOne(\App\Modules\TsUserContactTypes\Models\TsUserContactTypes::class, "id", "type_id");
    }

    public function vatCondition()
    {
        return $this->hasOne(\App\Modules\VatConditions\Models\VatConditions::class, "id", "vat_condition_id");
    }

    public function province()
    {
        return $this->hasOne(\App\Modules\Provinces\Models\Provinces::class, "id", "province_id");
    }

    public function tsUser()
    {
        return $this->hasOne(\App\Modules\TsUsers\Models\TsUsers::class, "id", "ts_user_id");
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
