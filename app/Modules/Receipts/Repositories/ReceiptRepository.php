<?php

namespace App\Modules\Receipts\Repositories;

use App\Modules\Receipts\Models\Receipts;
use Illuminate\Http\Request;


class ReceiptRepository
{
    public function findAll(Request $request)
    {
        $rows = Receipts
            ::select()
            ->with(
                'monotributo',
                'contact',
                'abroadContact',
                'concept',
                'receiptType',
                'buyerDocumentType',
                'paymentMethod',
                'tsUser',
                'activity',
                'associatedReceipt',
                'userCreate',
                'userUpdate',
            );

        if ($request->search) {
            $rows = $rows->where(function ($subQuery) use ($request) {
                $subQuery->where('buyer_document', 'like', "%{$request->search}%")
                    ->orWhereHas('tsUser', function ($query) use ($request) {
                        $query
                            ->where('first_name', 'like', "%{$request->search}%")
                            ->orWhere('last_name', 'like', "%{$request->search}%");
                    });
            });
        }

        if ($request->contact) {
            $rows = $rows->where(function ($subQuery) use ($request) {
                $subQuery->where('contact_id', 'like', "%{$request->contact}%");
            });
        }

        if ($request->abroadContact) {
            $rows = $rows->where(function ($subQuery) use ($request) {
                $subQuery->where('abroad_contact_id', 'like', "%{$request->abroadContact}%");
            });
        }

        if ($request->concept) {
            $rows = $rows->where(function ($subQuery) use ($request) {
                $subQuery->where('concept_id', 'like', "%{$request->concept}%");
            });
        }


        if ($request->receiptType) {
            $rows = $rows->where(function ($subQuery) use ($request) {
                $subQuery->where('receipt_type_id', 'like', "%{$request->receiptType}%");
            });
        }

        if ($request->buyerDocumentType) {
            $rows = $rows->where(function ($subQuery) use ($request) {
                $subQuery->where('buyer_document_type_id', 'like', "%{$request->buyerDocumentType}%");
            });
        }

        if ($request->paymentMethod) {
            $rows = $rows->where(function ($subQuery) use ($request) {
                $subQuery->where('payment_method_id', 'like', "%{$request->paymentMethod}%");
            });
        }

        if ($request->tsUser) {
            $rows = $rows->where(function ($subQuery) use ($request) {
                $subQuery->where('ts_user_id', 'like', "%{$request->tsUser}%");
            });
        }

        return $request->per_page ? $rows->paginate($request->per_page) : $rows->get();
    }

    public function find($id)
    {
        return
            Receipts::with(
                'monotributo',
                'contact',
                'abroadContact',
                'concept',
                'receiptType',
                'buyerDocumentType',
                'paymentMethod',
                'tsUser',
                'activity',
                'associatedReceipt',
                'userCreate',
                'userUpdate',
            )->find($id);
    }

    public function create($modelData): Receipts
    {
        if (auth()->check()) {
            $modelData->merge(
                [
                    'user_create_id' => auth()->user()->id,
                ]
            );
        }

        return Receipts::create($modelData->all());
    }

    public function update($modelData, $id): Receipts
    {
        if (auth()->check()) {
            $modelData->merge(
                [
                    'user_update_id' => auth()->user()->id,
                ]
            );
        }

        $model = Receipts::find($id);
        $model->update($modelData->all());

        return $model;
    }

    public function delete($id)
    {
        $model = Receipts::find($id);
        if ($model) {
            if (auth()->check()) {
                $model->update(
                    [
                        'user_update_id' => auth()->user()->id,
                    ]
                );
            }
            $model->delete();
        }
        return $model;
    }
}
