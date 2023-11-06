<?php

namespace App\Modules\TsArgMonotributos\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TsArgMonotributos extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'cuit',
        'clave_fiscal',
        'clave_fiscal_verified',
        'afip_balance',
        'afip_debt',
        'email',
        'privKey',
        'certificateRequest',
        'certificateRequestDate',
        'certificatePEM',
        'certificatePEMEmitionDate',
        'certificatePEMDueDate',
        'certificatePEMHomo',
        'sales_point',
        'abroad_sales_point',
        'how_to_work_id',
        'physical_space',
        'square_mts_number',
        'annual_electric_energy',
        'pay_rent',
        'annual_rental_amount',
        'estimated_monthly_amount',
        'other_activity_income',
        'employer_cuit',
        'spouse_contribution',
        'obra_social_id',
        'monotributo_category_id',
        'residence_id',
        'registration_date',
        'approved',
        'active',
        'deregistration_reason_id',
        'deregistration_date',
        'automatic_debit',
        'cooperative_cuit',
        'annual_bill',
        'spouse_cuil',
        'user_create_id',
        'user_update_id'
    ];



    public function obraSocial()
    {
        return $this->hasOne(\App\Modules\TsArgObrasSociales\Models\TsArgObrasSociales::class, "id", "obra_social_id");
    }

    public function monotributoCategory()
    {
        return $this->hasOne(\App\Modules\TsArgMonotributoCategories\Models\TsArgMonotributoCategories::class, "id", "monotributo_category_id");
    }

    public function residence()
    {
        return $this->hasOne(\App\Modules\Residences\Models\Residences::class, "id", "residence_id");
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
