<?php

namespace App\Modules\TsUserContacts\Repositories;

use App\Modules\TsUserContacts\Models\TsUserContacts;
use Illuminate\Http\Request;


class TsUserContactRepository
{
    public function findAll(Request $request)
    {
        $rows = TsUserContacts
            ::select()
            ->with(
                'type',
                'vatCondition',
                'province',
                'tsUser',
                'userCreate',
                'userUpdate',
            );

        if ($request->search) {
            $rows = $rows->where(function ($subQuery) use ($request) {
                $subQuery->where('first_name', 'like', "%{$request->search}%")
                    ->orWhere('last_name', 'like', "%{$request->search}%")
                    ->orWhereHas('tsUser', function ($query) use ($request) {
                        $query->where('first_name', 'like', "%{$request->search}%")
                            ->orWhere('last_name', 'like', "%{$request->search}%");
                    });
            });
        }

        if ($request->province) {
            $rows = $rows->where(function ($subQuery) use ($request) {
                $subQuery->where('province_id', 'like', "%{$request->province}%");
            });
        }

        if ($request->type) {
            $rows = $rows->where(function ($subQuery) use ($request) {
                $subQuery->where('type_id', 'like', "%{$request->type}%");
            });
        }

        if ($request->vatCondition) {
            $rows = $rows->where(function ($subQuery) use ($request) {
                $subQuery->where('vat_condition_id', 'like', "%{$request->vatCondition}%");
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
            TsUserContacts::with(
                'province',
                'tsUser',
                'userCreate',
                'userUpdate',
            )->find($id);
    }

    public function create($modelData): TsUserContacts
    {
        if (auth()->check()) {
            $modelData->merge(
                [
                    'user_create_id' => auth()->user()->id,
                ]
            );
        }

        return TsUserContacts::create($modelData->all());
    }

    public function update($modelData, $id): TsUserContacts
    {
        if (auth()->check()) {
            $modelData->merge(
                [
                    'user_update_id' => auth()->user()->id,
                ]
            );
        }

        $model = TsUserContacts::find($id);
        $model->update($modelData->all());

        return $model;
    }

    public function delete($id)
    {
        $model = TsUserContacts::find($id);
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
