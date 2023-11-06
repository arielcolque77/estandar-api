<?php

namespace App\Modules\TsUserStates\Repositories;

use App\Modules\TsUserStates\Models\TsUserStates;
use Illuminate\Http\Request;


class TsUserStateRepository
{
    public function findAll(Request $request)
    {
        $rows = TsUserStates
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
            TsUserStates::with(
                'userCreate',
                'userUpdate',
            )
            ->find($id);
    }

    public function create($modelData): TsUserStates
    {
        if (auth()->check()) {
            $modelData->merge(
                [
                    'user_create_id' => auth()->user()->id,
                ]
            );
        }

        return TsUserStates::create($modelData->all());
    }

    public function update($modelData, $id): TsUserStates
    {
        if (auth()->check()) {
            $modelData->merge(
                [
                    'user_update_id' => auth()->user()->id,
                ]
            );
        }

        $model = TsUserStates::find($id);
        $model->update($modelData->all());

        return $model;
    }

    public function delete($id)
    {
        $model = TsUserStates::find($id);
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
