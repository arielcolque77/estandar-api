<?php

namespace App\Modules\Provinces\Repositories;

use App\Modules\Provinces\Models\Provinces;
use Illuminate\Http\Request;


class ProvinceRepository
{
    public function findAll(Request $request)
    {
        $rows = Provinces
            ::select()
            ->with(
                'country',
                'userCreate',
                'userUpdate',
            );

        if ($request->search) {
            $rows = $rows->where(function ($subQuery) use ($request) {
                $subQuery->where('name', 'like', "%{$request->search}%")
                    ->orWhere('code', 'like', "%{$request->search}%")
                    ->orWhere('short_name', 'like', "%{$request->search}%")
                    ->orWhereHas('country', function ($query) use ($request) {
                        $query->where('name', 'like', "%{$request->search}%")
                            ->orWhere('country_code', 'like', "%{$request->search}%");
                    });
            });
        }

        if ($request->country) {
            $rows = $rows->where(function ($subQuery) use ($request) {
                $subQuery->where('country_id', 'like', "%{$request->country}%");
            });
        }

        $rows = $rows->orderBy("name", "ASC");

        return $request->per_page ? $rows->paginate($request->per_page) : $rows->get();
    }

    public function find($id)
    {
        return
            Provinces::with(
                'country',
                'userCreate',
                'userUpdate',
            )->find($id);
    }

    public function create($modelData): Provinces
    {
        if (auth()->check()) {
            $modelData->merge(
                [
                    'user_create_id' => auth()->user()->id,
                ]
            );
        }

        return Provinces::create($modelData->all());
    }

    public function update($modelData, $id): Provinces
    {
        if (auth()->check()) {
            $modelData->merge(
                [
                    'user_update_id' => auth()->user()->id,
                ]
            );
        }

        $model = Provinces::find($id);
        $model->update($modelData->all());

        return $model;
    }

    public function delete($id)
    {
        $model = Provinces::find($id);
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
