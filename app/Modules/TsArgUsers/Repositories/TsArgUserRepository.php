<?php

namespace App\Modules\TsArgUsers\Repositories;

use App\Modules\TsArgUsers\Models\TsArgUsers;
use Illuminate\Http\Request;


class TsArgUserRepository
{
    public function findAll(Request $request)
    {
        $rows = TsArgUsers
            ::select()
            ->with(
                'tsUser',
                'monotributo',
                'userCreate',
                'userUpdate',
            );

        if ($request->search) {
            $rows = $rows->where(function ($subQuery) use ($request) {
                $subQuery->where('dni', 'like', "%{$request->search}%");
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
            TsArgUsers::with(
                'tsUser',
                'monotributo',
                'userCreate',
                'userUpdate',
            )->find($id);
    }

    public function create($modelData): TsArgUsers
    {
        if (auth()->check()) {
            $modelData->merge(
                [
                    'user_create_id' => auth()->user()->id,
                ]
            );
        }

        return TsArgUsers::create($modelData->all());
    }

    public function update($modelData, $id): TsArgUsers
    {
        if (auth()->check()) {
            $modelData->merge(
                [
                    'user_update_id' => auth()->user()->id,
                ]
            );
        }

        $model = TsArgUsers::find($id);
        $model->update($modelData->all());

        return $model;
    }

    public function delete($id)
    {
        $model = TsArgUsers::find($id);
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
