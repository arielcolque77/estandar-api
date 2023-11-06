<?php

namespace App\Modules\VatConditions\Repositories;

use App\Modules\VatConditions\Models\VatConditions;
use Illuminate\Http\Request;


class VatConditionRepository
{
    public function findAll(Request $request)
    {
        $rows = VatConditions
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
            VatConditions::with(
                'userCreate',
                'userUpdate',
            )
            ->find($id);
    }

    public function create($modelData): VatConditions
    {
        if (auth()->check()) {
            $modelData->merge(
                [
                    'user_create_id' => auth()->user()->id,
                ]
            );
        }

        return VatConditions::create($modelData->all());
    }

    public function update($modelData, $id): VatConditions
    {
        if (auth()->check()) {
            $modelData->merge(
                [
                    'user_update_id' => auth()->user()->id,
                ]
            );
        }

        $model = VatConditions::find($id);
        $model->update($modelData->all());

        return $model;
    }

    public function delete($id)
    {
        $model = VatConditions::find($id);
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
