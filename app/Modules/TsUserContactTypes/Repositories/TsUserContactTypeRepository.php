<?php

namespace App\Modules\TsUserContactTypes\Repositories;

use App\Modules\TsUserContactTypes\Models\TsUserContactTypes;
use Illuminate\Http\Request;


class TsUserContactTypeRepository
{
    public function findAll(Request $request)
    {
        $rows = TsUserContactTypes
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
            TsUserContactTypes::with(
                'userCreate',
                'userUpdate',
            )
            ->find($id);
    }

    public function create($modelData): TsUserContactTypes
    {
        if (auth()->check()) {
            $modelData->merge(
                [
                    'user_create_id' => auth()->user()->id,
                ]
            );
        }

        return TsUserContactTypes::create($modelData->all());
    }

    public function update($modelData, $id): TsUserContactTypes
    {
        if (auth()->check()) {
            $modelData->merge(
                [
                    'user_update_id' => auth()->user()->id,
                ]
            );
        }

        $model = TsUserContactTypes::find($id);
        $model->update($modelData->all());

        return $model;
    }

    public function delete($id)
    {
        $model = TsUserContactTypes::find($id);
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
