<?php

namespace App\Modules\ReceiptTypes\Repositories;

use App\Modules\ReceiptTypes\Models\ReceiptTypes;
use Illuminate\Http\Request;


class ReceiptTypeRepository
{
    public function findAll(Request $request)
    {
        $rows = ReceiptTypes
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
            ReceiptTypes::with(
                'userCreate',
                'userUpdate',
            )
            ->find($id);
    }

    public function create($modelData): ReceiptTypes
    {
        if (auth()->check()) {
            $modelData->merge(
                [
                    'user_create_id' => auth()->user()->id,
                ]
            );
        }

        return ReceiptTypes::create($modelData->all());
    }

    public function update($modelData, $id): ReceiptTypes
    {
        if (auth()->check()) {
            $modelData->merge(
                [
                    'user_update_id' => auth()->user()->id,
                ]
            );
        }

        $model = ReceiptTypes::find($id);
        $model->update($modelData->all());

        return $model;
    }

    public function delete($id)
    {
        $model = ReceiptTypes::find($id);
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
