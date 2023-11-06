<?php

namespace App\Modules\Residences\Repositories;

use App\Modules\Residences\Models\Residences;
use Illuminate\Http\Request;


class ResidenceRepository
{
    public function findAll(Request $request)
    {
        $rows = Residences
            ::select()
            ->with(
                'province',
                'userCreate',
                'userUpdate',
            );

        if ($request->search) {
            $rows = $rows->where(function ($subQuery) use ($request) {
                $subQuery->where('street', 'like', "%{$request->search}%")
                    ->orWhere('city', 'like', "%{$request->search}%")
                    ->orWhere('postal_code', 'like', "%{$request->search}%")
                    ->orWhereHas('province', function ($query) use ($request) {
                        $query->where('name', 'like', "%{$request->search}%");
                    });
            });
        }

        if ($request->province) {
            $rows = $rows->where(function ($subQuery) use ($request) {
                $subQuery->where('province_id', 'like', "%{$request->province}%");
            });
        }

        return $request->per_page ? $rows->paginate($request->per_page) : $rows->get();
    }

    public function find($id)
    {
        return
            Residences::with(
                'province',
                'userCreate',
                'userUpdate',
            )->find($id);
    }

    public function create($modelData): Residences
    {
        if (auth()->check()) {
            $modelData->merge(
                [
                    'user_create_id' => auth()->user()->id,
                ]
            );
        }

        return Residences::create($modelData->all());
    }

    public function update($modelData, $id): Residences
    {
        if (auth()->check()) {
            $modelData->merge(
                [
                    'user_update_id' => auth()->user()->id,
                ]
            );
        }

        $model = Residences::find($id);
        $model->update($modelData->all());

        return $model;
    }

    public function delete($id)
    {
        $model = Residences::find($id);
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
