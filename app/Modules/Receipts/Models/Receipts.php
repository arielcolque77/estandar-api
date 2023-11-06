<?php

namespace App\Modules\Receipts\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Receipts extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'monotributo_id',
        'contact_id',
        'abroad_contact_id',
        'concept_id',
        'receipt_date',
        'total_amount',
        'net_amount',
        'date_since',
        'date_until',
        'payment_due_date',
        'receipt_type_id',
        'buyer_document_type_id',
        'payment_method_id',
        'currency',
        'buyer_document',
        'cae',
        'cae_due_date',
        'voucher_number',
        'paid',
        'ts_user_id',
        'ts_activity_id',
        'associated_receipt_id',
        'sales_point',
        'currency_trade',
        'afip_coming',
        'user_create_id',
        'user_update_id'
    ];

    public function monotributo()
    {
        return $this->hasOne(\App\Modules\TsArgMonotributos\Models\TsArgMonotributos::class, "id", "monotributo_id");
    }

    public function contact()
    {
        return $this->hasOne(\App\Modules\TsUserContacts\Models\TsUserContacts::class, "id", "contact_id");
    }

    public function abroadContact()
    {
        return $this->hasOne(\App\Modules\TsAbroadUserContacts\Models\TsAbroadUserContacts::class, "id", "abroad_contact_id");
    }

    public function concept()
    {
        return $this->hasOne(\App\Modules\Concepts\Models\Concepts::class, "id", "concept_id");
    }

    public function receiptType()
    {
        return $this->hasOne(\App\Modules\ReceiptTypes\Models\ReceiptTypes::class, "id", "receipt_type_id");
    }

    public function buyerDocumentType()
    {
        return $this->hasOne(\App\Modules\BuyerDocumentTypes\Models\BuyerDocumentTypes::class, "id", "buyer_document_type_id");
    }

    public function paymentMethod()
    {
        return $this->hasOne(\App\Modules\PaymentMethods\Models\PaymentMethods::class, "id", "payment_method_id");
    }

    public function tsUser()
    {
        return $this->hasOne(\App\Modules\TsUsers\Models\TsUsers::class, "id", "ts_user_id");
    }

    public function activity()
    {
        return $this->hasOne(\App\Modules\TsActivities\Models\TsActivities::class, "id", "ts_activity_id");
    }

    public function associatedReceipt()
    {
        return $this->hasOne(\App\Modules\Receipts\Models\Receipts::class, "id", "associated_receipt_id");
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
