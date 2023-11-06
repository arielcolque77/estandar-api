<?php

namespace App\Modules\TsArgMonotributoCategories\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TsArgMonotributoCategories extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'letter',
        'lower_limit',
        'upper_limit',
        'activity',
        'min_employee',
        'surface',
        'energy',
        'annual_rent',
        'max_amount',
        'service_tax',
        'thing_tax',
        'sipa_contribution',
        'os_contribution',
        'total_service',
        'total_thing',
        'is_letter',
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
