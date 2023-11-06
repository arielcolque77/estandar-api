<?php

namespace App\Modules\TsAbroadUserContacts\Repositories;

use App\Modules\TsAbroadUserContacts\Models\TsAbroadUserContacts;
use Illuminate\Http\Request;


class TsAbroadUserContactRepository
{
    public function findAll(Request $request)
    {
        $rows = TsAbroadUserContacts
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

        return $request->per_page ? $rows->paginate($request->per_page) : $rows->get();
    }

    public function find($id)
    {
        return
            TsAbroadUserContacts::with(
                'userCreate',
                'userUpdate',
            )->find($id);
    }

    public function create($modelData): TsAbroadUserContacts
    {
        if (auth()->check()) {
            $modelData->merge(
                [
                    'user_create_id' => auth()->user()->id,
                ]
            );
        }

        return TsAbroadUserContacts::create($modelData->all());
    }

    public function update($modelData, $id): TsAbroadUserContacts
    {
        if (auth()->check()) {
            $modelData->merge(
                [
                    'user_update_id' => auth()->user()->id,
                ]
            );
        }

        $model = TsAbroadUserContacts::find($id);
        $model->update($modelData->all());

        return $model;
    }

    public function delete($id)
    {
        $model = TsAbroadUserContacts::find($id);
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
