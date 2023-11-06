<?php

namespace App\Modules\TsAbroadUserContacts\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TsAbroadUserContacts extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'commercial_address',
        'destination_country_id',
        'receiver_country_cuit',
        'tax_id',
        'export_type_id',
        'incoterm',
        'incoterm_extra_info',
        'payment_date',
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
