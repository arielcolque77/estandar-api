<?php

namespace App\Modules\TsUsers\Repositories;

use App\Modules\TsUsers\Models\TsUsers;
use Illuminate\Http\Request;


class TsUserRepository
{
    public function findAll(Request $request)
    {
        $rows = TsUsers
            ::select()
            ->with(
                "state",
                'country',
                'realResidence',
                'fiscalResidence',
                'taxJurisdiction',
                'userCreate',
                'userUpdate',
            );

        if ($request->search) {
            $rows = $rows->where(function ($subQuery) use ($request) {
                $subQuery->where('first_name', 'like', "%{$request->search}%")
                    ->orWhere('last_name', 'like', "%{$request->search}%")
                    ->orWhere('cuit', 'like', "%{$request->search}%")
                    ->orWhere('email', 'like', "%{$request->search}%")
                    ->orWhereHas('country', function ($query) use ($request) {
                        $query->where('name', 'like', "%{$request->search}%")
                            ->orWhere('country_code', 'like', "%{$request->search}%");
                    })
                    ->orWhereHas('state', function ($query) use ($request) {
                        $query->where('name', 'like', "%{$request->search}%");
                    });
            });
        }

        if ($request->country) {
            $rows = $rows->where(function ($subQuery) use ($request) {
                $subQuery->where('country_id', 'like', "%{$request->country}%");
            });
        }

        if ($request->state) {
            $rows = $rows->where(function ($subQuery) use ($request) {
                $subQuery->where('state_id', 'like', "%{$request->state}%");
            });
        }

        if ($request->jurisdiction) {
            $rows = $rows->where(function ($subQuery) use ($request) {
                $subQuery->where('tax_jurisdiction_id', 'like', "%{$request->jurisdiction}%");
            });
        }

        return $request->per_page ? $rows->paginate($request->per_page) : $rows->get();
    }

    public function find($id)
    {
        return
            TsUsers::with(
                'state',
                'country',
                'realResidence',
                'fiscalResidence',
                'taxJurisdiction',
                'userCreate',
                'userUpdate',
            )->find($id);
    }

    public function create($modelData): TsUsers
    {
        if (auth()->check()) {
            $modelData->merge(
                [
                    'user_create_id' => auth()->user()->id,
                ]
            );
        }

        return TsUsers::create($modelData->all());
    }

    public function update($modelData, $id): TsUsers
    {
        if (auth()->check()) {
            $modelData->merge(
                [
                    'user_update_id' => auth()->user()->id,
                ]
            );
        }

        $model = TsUsers::find($id);
        $model->update($modelData->all());

        return $model;
    }

    public function delete($id)
    {
        $model = TsUsers::find($id);
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
