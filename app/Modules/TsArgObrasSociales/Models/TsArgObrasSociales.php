<?php

namespace App\Modules\TsArgObrasSociales\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TsArgObrasSociales extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'code',
        'phone',
        'web_page',
        'enabled',
        'acronyms',
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
