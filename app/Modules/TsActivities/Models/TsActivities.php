<?php

namespace App\Modules\TsActivities\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TsActivities extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'description',
        'afip_activity',
        'afip_code',
        'rubro',
        'tributo_simple',
        'monotributo',
        'activity_type',
        'ts_code',
        'user_create_id',
        'user_update_id'
    ];

    public function userCreate()
    {
        return $this->hasOne(\App\Modules\Users\Models\Users::class, "id", "user_create_id");
    }

    public function userUpdate()
    {
        return $this->hasOne(\App\Modules\Users\Models\Users::class, "id", "user_update_id");
    }
}
