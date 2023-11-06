<?php

namespace App\Modules\TsUsers\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TsUsers extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'country_id',
        'first_name',
        'last_name',
        'cuit',
        'birth_date',
        'address',
        'cellphone',
        'email',
        'recommended',
        'state_id',
        'active',
        'accountant_message',
        'real_residence_id',
        'fiscal_residence_id',
        'tax_jurisdiction_id',
        'unsubscription_date',
        'reenter_data',
        'tax_report_service',
        'tax_report_service_registration_date',
        'billing_service',
        'billing_service_registration_date',
        'accounting_service',
        'accountring_service_registration_date',
        'blocked_user_date',
        'user_create_id',
        'user_update_id'
    ];



    public function state()
    {
        return $this->hasOne(\App\Modules\TsUserStates\Models\TsUserStates::class, "id", "state_id");
    }

    public function country()
    {
        return $this->hasOne(\App\Modules\Countries\Models\Countries::class, "id", "country_id");
    }

    public function realResidence()
    {
        return $this->hasOne(\App\Modules\Residences\Models\Residences::class, "id", "real_residence_id");
    }
    public function fiscalResidence()
    {
        return $this->hasOne(\App\Modules\Residences\Models\Residences::class, "id", "fiscal_residence_id");
    }
    public function taxJurisdiction()
    {
        return $this->hasOne(\App\Modules\Provinces\Models\Provinces::class, "id", "tax_jurisdiction_id");
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
