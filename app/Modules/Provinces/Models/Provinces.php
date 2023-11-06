<?php

namespace App\Modules\Provinces\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provinces extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'code',
        'enabled',
        'url',
        'unified_monotributo',
        'short_name',
        'country_id',
        'user_create_id',
        'user_update_id'
    ];



    public function country()
    {
        return $this->hasOne(\App\Modules\Countries\Models\Countries::class, "id", "country_id");
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
