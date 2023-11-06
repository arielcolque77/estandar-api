<?php

namespace App\Modules\Residences\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Residences extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'street',
        'number',
        'floor',
        'department',
        'city',
        'postal_code',
        'additional_data_type',
        'additional_data',
        'type',
        'province_id',
        'user_create_id',
        'user_update_id'
    ];



    public function province()
    {
        return $this->hasOne(\App\Modules\Provinces\Models\Provinces::class, "id", "province_id");
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
