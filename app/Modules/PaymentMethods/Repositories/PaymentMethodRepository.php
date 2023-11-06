<?php

namespace App\Modules\PaymentMethods\Repositories;

use App\Modules\PaymentMethods\Models\PaymentMethods;
use Illuminate\Http\Request;


class PaymentMethodRepository
{
    public function findAll(Request $request)
    {
        $rows = PaymentMethods
            ::select()
            ->with(
                'userCreate',
                'userUpdate',
            );

        if ($request->search) {
            $rows = $rows->where(function ($subQuery) use ($request) {
                $subQuery->where('name', 'like', "%{$request->search}%");
            });
        }

        return
            $request->per_page ? $rows->paginate($request->per_page) : $rows->get();
    }

    public function find($id)
    {
        return
            PaymentMethods::with(
                'userCreate',
                'userUpdate',
            )
            ->find($id);
    }

    public function create($modelData): PaymentMethods
    {
        if (auth()->check()) {
            $modelData->merge(
                [
                    'user_create_id' => auth()->user()->id,
                ]
            );
        }

        return PaymentMethods::create($modelData->all());
    }

    public function update($modelData, $id): PaymentMethods
    {
        if (auth()->check()) {
            $modelData->merge(
                [
                    'user_update_id' => auth()->user()->id,
                ]
            );
        }

        $model = PaymentMethods::find($id);
        $model->update($modelData->all());

        return $model;
    }

    public function delete($id)
    {
        $model = PaymentMethods::find($id);
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
